<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\ContentImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contents = Content::with('content_images')->latest()->paginate(10);
        return view('panel.contents.index', compact('contents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('panel.contents.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255|unique:contents,title',
            'tag' => 'nullable|string|max:255',
            'content' => 'required|string',
            'slug' => 'nullable|string|max:255|unique:contents,slug',
            'images.*' => 'nullable|image|max:15048',
        ]);
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }
        $content = Content::create($validated);

        if ($request->hasFile('images')) {
            $subdirectory = 'images/'.$validated['title'];

            foreach ($request->file('images') as $image) {
                $imagePath = $image->store($subdirectory, 'public');
                // Assuming you have a ContentImage model and content_images table
                \App\Models\ContentImage::create([
                    'content_id' => $content->id,
                    'image' => $imagePath,
                ]);
            }
        }

        return redirect()->route('panel.contents.index')
            ->with('success', 'Content created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Content $content) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Content $content)
    {
        return view('panel.contents.edit', compact('content'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Content $content)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255|unique:contents,title,'.$content->id,
            'tag' => 'nullable|string|max:255',
            'content' => 'required|string',
            'slug' => 'nullable|string|max:255|unique:contents,slug,'.$content->id,
            'images.*' => 'nullable|image|max:15048',
        ]);

        $content->update($validated);

        if ($request->hasFile('images')) {
            // Delete old images and their files from storage
            $oldImages = \App\Models\ContentImage::where('content_id', $content->id)->get();
            foreach ($oldImages as $oldImage) {
                if (Storage::disk('public')->exists($oldImage->image)) {
                    Storage::disk('public')->delete($oldImage->image);
                }
            }
            \App\Models\ContentImage::where('content_id', $content->id)->delete();
            $subdirectory = 'images/'.$validated['title'];

            foreach ($request->file('images') as $image) {
                $imagePath = $image->store($subdirectory, 'public');
                // Assuming you have a ContentImage model and content_images table
                \App\Models\ContentImage::create([
                    'content_id' => $content->id,
                    'image' => $imagePath,
                ]);
            }
        }

        return redirect()->route('panel.contents.index')
            ->with('success', 'Content updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Content $content)
    {
        $content->delete();
        // Delete associated images and their files from storage
        $oldImages = \App\Models\ContentImage::where('content_id', $content->id)->get();
        foreach ($oldImages as $oldImage) {
            if (Storage::disk('public')->exists($oldImage->image)) {
                Storage::disk('public')->delete($oldImage->image);
            }
        }
        \App\Models\ContentImage::where('content_id', $content->id)->delete();

        return redirect()->route('panel.contents.index')
            ->with('success', 'Content deleted successfully.');
    }
}
