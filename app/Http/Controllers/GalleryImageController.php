<?php

namespace App\Http\Controllers;
use App\Models\GalleryImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galleryImages = GalleryImage::all();
        return view('panel.gallery.index', compact('galleryImages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('panel.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $validated = $request->validate([
            'tag' => 'nullable|string|max:255',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image.*' => 'required|image',
       ]);

         $count = 1;
         foreach ($request->file('image') as $image) {

            $imagePath = $image->store('gallery', 'public');
            GalleryImage::create([
                'tag' => $validated['tag'],
                'title' => $validated['title'].'-'. $count++,
                'description' => $validated['description'],
                'image' => $imagePath,
            ]);
         }

         return redirect()->route('panel.gallery-images.index')->with('success', 'Image uploaded successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(GalleryImage $galleryImage)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GalleryImage $galleryImage)
    {
        return view('panel.gallery.edit', compact('galleryImage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GalleryImage $galleryImage)
    {
        $validated = $request->validate([
            'tag' => 'nullable|string|max:255',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image.*' => 'required|image',
       ]);

       if ($request->hasFile('image')) {
            // Delete the old image if exists
            if ($galleryImage->image && Storage::disk('public')->exists($galleryImage->image)) {
                Storage::disk('public')->delete($galleryImage->image);
            }
            $imagePath = $request->file('image')->store('gallery', 'public');
       }
         $galleryImage->tag = $validated['tag'];
         $galleryImage->title = $validated['title'];
         $galleryImage->description = $validated['description'];
         $galleryImage->image = $imagePath;
         $galleryImage->save();
       return redirect()->route('panel.gallery-images.index')->with('success', 'Gallery image updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GalleryImage $galleryImage)
    {
        // Delete the image file from storage
        if ($galleryImage->image && Storage::disk('public')->exists($galleryImage->image)) {
            Storage::disk('public')->delete($galleryImage->image);
        }
        $galleryImage->delete();
        return redirect()->route('panel.gallery-images.index')->with('success', 'Gallery image deleted successfully.');
    }

    public function getAllImages()
    {
        return GalleryImage::all();
    }
}
