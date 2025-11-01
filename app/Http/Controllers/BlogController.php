<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Blog::query();
        
        if($request->has('search'))
        {
            $query->where('title', 'like', '%'.$request->search.'%')
                ->orWhere('content', 'like', '%'.$request->search.'%')
                ->orWhere('author', 'like', '%'.$request->search.'%');
        }
        $blogs = $query->get();

        return response()->json([
            'data' => $blogs,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) 
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'content' => 'required',
            'author' => 'required'
        ]);
        if ($validator->fails()) {
         //   dd($validator->errors());
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        $blog = Blog::create([
            'title' => $request->title,
            'content' => $request->content,
            'author' => $request->author
        ]);

        return response()->json([
            'data' => $blog
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $blog = Blog::findOrFail($request->id);
        return response()->json([
            'status' => '200',
            'data' => $blog,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $blog = Blog::where('id', $request->id)->first();
        if(!$blog){
            return respnse()->json([
                'status' => 'No Blog Found for given ID'
            ], 404);
        }

        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->author = $request->author;

        $blog->save();

        return response()->json([
            'status' => 'success',
            'blog' => $blog
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        //
    }
}
