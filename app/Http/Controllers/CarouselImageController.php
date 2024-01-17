<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarouselImage;

class CarouselImageController extends Controller
{
    public function index()
    {
        $carouselImages = CarouselImage::all();
        return view('carousel.index', compact('carouselImages'));
    }

    public function create()
    {
        return view('carousel.tambah');
    }
    public function store(Request $request)
    {
        // Validate the incoming request.
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle file upload.
        // $imagePath = $request->file('image')->store('carousel_images', 'public/images');
        $imagePath = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images/anggota'), $imagePath);
        // Save the image path to the database.
        CarouselImage::create([
            'image_path' => $imagePath,
        ]);

        return redirect('/carousel');

    }
}

