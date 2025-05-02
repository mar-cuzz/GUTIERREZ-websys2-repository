<?php

namespace App\Http\Controllers;

use App\Models\photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $photos = Photo::latest()->paginate(9);
        return view('upload', compact('photos'));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function storeSingle(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $image = $request->file('image');
        $name = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('images'), $name);

        Photo::create(['image' => $name]);

        return back()->with('success', 'Single image uploaded successfully!');
    }

    public function storeMultiple(Request $request)
    {
        $request->validate([
            'images.*' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        foreach ($request->file('images') as $image) {
            $name = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images'), $name);

            Photo::create(['image' => $name]);
        }

        return back()->with('success', 'Multiple images uploaded successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(photo $photo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(photo $photo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, photo $photo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Photo $photo)
    {
        $imagePath = public_path('images/' . $photo->image);

        // Delete the image file from storage
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        // Delete the DB record
        $photo->delete();

        return back()->with('success', 'Image deleted successfully.');
    }

}
