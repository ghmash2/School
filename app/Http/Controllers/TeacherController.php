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
            'name' => 'string|max:255',
            'email' => 'email|unique:teachers,email',
            'subject' => 'string|max:255',
            'phone' => 'string|max:20|unique:teachers,phone',
            'join_date' => 'date',
            'address' => 'nullable|string',
            'image' => 'nullable|image|max:15048',
            'retire_date' => 'nullable|date',
            'dept' => 'string|max:255',
            'designation' => 'string|max:255',
            'age' => 'integer',
        ]);

          if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $validated['image'] = $imagePath;
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
        //dd($request->all());
           try {
        $validated = $request->validate([
        'name' => 'nullable|string|max:255',
        'email' => 'nullable|email|unique:teachers,email,' . $teacher->id,
        'subject' => 'nullable|string|max:255',
        'phone' => 'nullable|string|max:20|unique:teachers,phone,' . $teacher->id,
        'join_date' => 'nullable|date',
        'address' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'retire_date' => 'nullable|date',
        'dept' => 'nullable|string|max:255',
        'designation' => 'nullable|string|max:255',
        'age' => 'nullable|integer|min:18|max:100',
    ]);
     } catch (\Illuminate\Validation\ValidationException $e) {
        dd($e->errors()); // This shows exactly which rules failed
    }
        //dd($validated);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($teacher->image) {
                Storage::disk('public')->delete($teacher->image);
            }
            $validated['image'] = $request->file('image')->store('images', 'public');
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
        if ($teacher->image) {
            Storage::disk('public')->delete($teacher->image);
        }

        $teacher->delete();

        return redirect()->route('panel.teachers.index')
            ->with('success', 'Teacher deleted successfully.');
    }
    public function view()
    {
        $teacher = Teacher::get();
        return $teacher;
    }
}
