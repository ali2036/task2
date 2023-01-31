<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
// use Illuminate\Support\Facades\Image;


use Illuminate\Http\Request;

class UploadImageController extends Controller
{
    public function index()
    {
      $images = Storage::disk('local')->files('images');
      
      return view('show-images', compact('images'));
    }

    public function upload(Request $request)
    {
        $images = $request->file('file_upload');
        foreach ($images as $image) {
            $filename = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            $name = Image::make($image)->stream('jpeg',100);
            $path = Storage::disk('local')->put('images/'.$filename.'.jpeg', $name);

        }
        return redirect('index');
    }
}
