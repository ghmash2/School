<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = Teacher::latest()->paginate(10);

        return view('panel.teachers.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('panel.teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:teachers',
            'subject' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'join_date' => 'required|date',
            'address' => 'nullable|string',
            'image' => 'nullable|image|max:15048',
            'retire_date' => 'required|date',
            'dept' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'age' => 'integer',
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('teachers', 'public');
        }

        Teacher::create($validated);

        return redirect()->route('panel.teachers.index')
            ->with('success', 'Teacher created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {
        return view('panel.teachers.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teacher $teacher)
    {
        $validated = $request->validate([
             'name' => 'required|string|max:255',
            'email' => 'required|email|unique:teachers',
            'subject' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'join_date' => 'required|date',
            'address' => 'nullable|string',
            'image' => 'nullable|image|max:15048',
            'retire_date' => 'required|date',
            'dept' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'age' => 'integer',

        ]);

        if ($request->hasFile('photo')) {
            // Delete old photo
            if ($teacher->photo) {
                Storage::disk('public')->delete($teacher->photo);
            }
            $validated['photo'] = $request->file('photo')->store('teachers', 'public');
        }

        $teacher->update($validated);

        return redirect()->route('panel.teachers.index')
            ->with('success', 'Teacher updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        if ($teacher->photo) {
            Storage::disk('public')->delete($teacher->photo);
        }

        $teacher->delete();

        return redirect()->route('panel.teachers.index')
            ->with('success', 'Teacher deleted successfully.');
    }
}
