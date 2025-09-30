<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Psy\Util\Str;

class StaffController extends Controller
{ /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $staffs = Staff::latest()->paginate(10);

        return view('panel.staffs.index', compact('staffs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('panel.staffs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'string|max:255',
            'email' => 'email|unique:staffs,email',
            'subject' => 'string|max:255',
            'phone' => 'string|max:20|unique:staffs,phone',
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

        Staff::create($validated);

        return redirect()->route('panel.staffs.index')
            ->with('success', 'staff created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Staff $staff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Staff $staff)
    {
        return view('panel.staffs.edit', compact('staff'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Staff $staff)
    {
        //dd($request->all());
           try {
        $validated = $request->validate([
        'name' => 'nullable|string|max:255',
        'email' => 'nullable|email|unique:staffs,email,' . $staff->id,
        'subject' => 'nullable|string|max:255',
        'phone' => 'nullable|string|max:20|unique:staffs,phone,' . $staff->id,
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
            if ($staff->image) {
                Storage::disk('public')->delete($staff->image);
            }
            $validated['image'] = $request->file('image')->store('images', 'public');
        }

        $staff->update($validated);

        return redirect()->route('panel.staffs.index')
            ->with('success', 'staff updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Staff $staff)
    {
        if ($staff->image) {
            Storage::disk('public')->delete($staff->image);
        }

        $staff->delete();

        return redirect()->route('panel.staffs.index')
            ->with('success', 'staff deleted successfully.');
    }
    public function view()
    {
        $staffs = Staff::get();
        return $staffs;
    }
}
