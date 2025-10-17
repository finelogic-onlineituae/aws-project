<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class FileController extends Controller
{
    public function uploadFile(Request $request)
    {
        $path = $request->file('myfile')->store('uploads', 's3');
        Storage::disk('s3')->setVisibility($path, 'public');
        $url = Storage::disk('s3')->url($path);

        File::create(['file_path' => $url]);
        return $this->viewFiles();
        //git test comment
    }

    public function viewFiles()
    {
       $files = File::all();
       return view('file-upload', compact('files'));
    }

    public function getData()
    {
        //
    }

    public function getUsers()
    {
        $users = User::all();
        return response()->json([
            'message' => 'Success',
            'data' => $users
        ]);
    }

    public function addUser(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make('password'),
        ]);

        return $this->getUsers();

    }
}
