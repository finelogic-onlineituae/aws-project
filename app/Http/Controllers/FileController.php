<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function uploadFile(Request $request)
    {
        $path = $request->file('myfile')->store('uploads', 's3');
        Storage::disk('s3')->setVisibility($path, 'public');
        $url = Storage::disk('s3')->url($path);

        File::create(['file_path' => $url]);
        return $this->viewFiles();
    }

    public function viewFiles()
    {
       $files = File::all();
       return view('file-upload', compact('files'));
    }

}
