<?php

namespace App\Http\Controllers;

use App\Models\BasicInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BasicInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $basicInfo = BasicInfo::firstOrFail();
        return view('panel.basicInfo.index', compact('basicInfo'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(BasicInfo $basicInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BasicInfo $basicInfo)
    {
        return view('panel.basicInfo.edit', compact('basicInfo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BasicInfo $basicInfo)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'motto' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'address' => 'required|string',
            'office_time' => 'nullable|string',
            'google_map' => 'nullable|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            'eiin' => 'required|string',
            'facebook' => 'nullable|string',
            'twitter' => 'nullable|string',
            'instagram' => 'nullable|string',
            'youtube' => 'nullable|string',

        ]);
       // sanitize input
            $validated = array_map(function ($value) {
                return is_string($value) ? strip_tags($value) : $value;
            }, $validated);


        if ($request->hasFile('logo')) {
            // Delete old image
            if ($basicInfo->logo) {
                Storage::disk('public')->delete($basicInfo->logo);
            }
           $validated['logo'] = $request->file('logo')->store('images', 'public');

        }
        $basicInfo->update($validated);
        return redirect()->route('panel.basic-infos.index', $basicInfo)->with('success', 'Basic info updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BasicInfo $basicInfo)
    {
        //
    }
}
