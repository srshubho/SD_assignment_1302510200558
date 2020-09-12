<?php

namespace App\Http\Controllers;
use App\ImageModel;
use Illuminate\Http\Request;
use Image;

class ImageController extends Controller {
    public static $counter = 1;
    //
    public function index() {
        return view('admin.pages.image.create');
    }

    public function store(Request $request) {
        if ($request->hasFile('filename')) {
            // $originalImages = $request->filename;

            foreach ($request->filename as $file) {

                $imageName = $this->uploadImage($file);
                $obj = new ImageModel;
                $obj->filename = $imageName;
                $obj->save();
                // echo $imageName;
                $this::$counter++;

            }
            $this::$counter = 1;
            return back()->with('success', 'Your images has been successfully Upload');
        }

    }
    private function uploadImage($originalImage) {
        $profileImage = Image::make($originalImage);

        $tmp = $originalImage->getClientOriginalName();
        $ext2 = explode(".", $tmp);
        $ext = end($ext2);
        $imageName = time() . $this::$counter . '.' . $ext;
        // local
        $path = public_path() . '/uploads/';

        $profileImage->save($path . $imageName);
        return $imageName;
    }

}
