<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    //
    public function index()
    {
        $images = Image::published()->latest()->paginate(15);
        return view('image.index',['images'=> $images]);
    }
    public function show(Image $image)
    {
        return view('image.show', ['image'=>$image]);
    }
}
