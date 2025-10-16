<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notices = Notice::with('notice_files')->latest()->paginate(10);

        return view('panel.notices.index', compact('notices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('panel.notices.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'section' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'tag' => 'nullable|string|max:255',
            'published_date' => 'required|date',
            'published_by' => 'required|string|max:255',
            'description' => 'required|string',
            'slug' => 'nullable|string|max:255|unique:notices,slug',
            'files.*' => 'nullable|file|max:15048', // Max 15MB per file
        ]);
       // sanitize input
            $validated = array_map(function ($value) {
                return is_string($value) ? strip_tags($value) : $value;
            }, $validated);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }
        $notice = Notice::create($validated);

        if ($request->hasFile('files')) {
            $subdirectory = 'notices/'.$validated['title'];
            foreach ($request->file('files') as $file) {
                $filePath = $file->store($subdirectory, 'public');
                // Assuming you have a NoticeFile model and notice_files table
                \App\Models\NoticeFile::create([
                    'notice_id' => $notice->id,
                    'file' => $filePath,
                ]);
            }
        }

        return redirect()->route('panel.notices.index')->with('success', 'Notice created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Notice $notice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Notice $notice)
    {
        return view('panel.notices.edit', compact('notice'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Notice $notice)
    {
        $validated = $request->validate([
            'section' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'tag' => 'nullable|string|max:255',
            'published_date' => 'required|date',
            'published_by' => 'required|string|max:255',
            'description' => 'required|string',
            'slug' => 'nullable|string|max:255|unique:notices,slug,'.$notice->id,
            'files.*' => 'nullable|file|max:15048', // Max 15MB per file
        ]);
       // sanitize input
            $validated = array_map(function ($value) {
                return is_string($value) ? strip_tags($value) : $value;
            }, $validated);
            
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }
        $notice->update($validated);

        if ($request->hasFile('files')) {
            $subdirectory = 'notices/'.$validated['title'];
            // Delete data from Storage
            $oldFiles = \App\Models\NoticeFile::where('notice_id', $notice->id)->get();
            foreach ($oldFiles as $oldFile) {
                if (Storage::disk('public')->exists($oldFile->file)) {
                    Storage::disk('public')->delete($oldFile->file);
                }
            }
            // Delete existing files if needed
            $notice->notice_files()->delete();
            foreach ($request->file('files') as $file) {
                $filePath = $file->store($subdirectory, 'public');
                // Assuming you have a NoticeFile model and notice_files table
                \App\Models\NoticeFile::create([
                    'notice_id' => $notice->id,
                    'file' => $filePath,
                ]);
            }
        }

        return redirect()->route('panel.notices.index')->with('success', 'Notice updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notice $notice)
    {
        $notice->delete();
        // Delete associated files from storage if necessary
        $oldFiles = \App\Models\NoticeFile::where('notice_id', $notice->id)->get();
        foreach ($oldFiles as $oldFile) {
            if (Storage::disk('public')->exists($oldFile->file)) {
                Storage::disk('public')->delete($oldFile->file);
            }
        }
        // Delete associated files from database
        $notice->notice_files()->delete();

        return redirect()->route('panel.notices.index')->with('success', 'Notice deleted successfully.');
    }

    public function view($section)
    {
        $content = Notice::where('section', $section)->with('notice_files')->get();

        return $content;
    }

    public function findLatestNotices()
    {
        $content = Notice::with('notice_files')->latest()->limit(5)->get();

        $notices = $content->transform(function ($notice) {
            $notice->url = $this->getNoticeSectionUrl($notice->section);

            return $notice;
        });

        return $notices;
    }

    public function getNoticeSectionUrl($section)
    {
        $sectionRoutes = [
            'Academic Calender' => route('academic.calendar'),
            'Class Routine' => route('academic.routine'),
            'Syllabus and Booklist' => route('academic.syllabus'),
            'Exam Routine' => route('academic.exam-routine'),
            'Notices' => route('academic.notice'),
            'Result' => route('academic.result'),
            'Admission Circular' => route('admission.circular'),
            'Prospectus' => route('admission.prospectus'),
            'Admission Result' => route('admission.admission-result'),
            'Waiting List' => route('admission.waiting-list'),
            'Courses' => route('admission.courses'),
            'Digital-Class-Six' => route('digital.six'),
            'Digital-Class-Seven' => route('digital.seven'),
            'Digital-Class-Eight' => route('digital.eight'),
            'Digital-Class-Nine-Ten' => route('digital.nine-ten'),
            // Add more sections as needed
        ];

        return $sectionRoutes[$section] ?? '#';
    }

    public function downloadFile($id)
    {

        $file = \App\Models\NoticeFile::findOrFail($id);

        $filePath = storage_path('app/public/'.$file->file);

        if (! file_exists($filePath)) {
            // Log the error for debugging
            Log::error("File not found at path: {$filePath}");
            abort(404, "File not found. Path: {$filePath}");
        }

        $originalName = basename($file->file);

        return response()->download($filePath, $originalName);
    }
}
