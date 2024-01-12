<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'text_post' => 'nullable|string',
            'img_post' => 'required_if:text_post,null|image|max:2048|mimes:jpg,png,jpeg,webp,gif,svg,jfif'
        ]);
        $post = new Post();
        $post->text = $request->get('text_post');
        $post->user_id = $request->user()->id;
		
        if($request->img_post != null){
            $imageName = time().'.'.$request->img_post->getClientOriginalExtension();
            $request->img_post->move(public_path('uploads/post'), $imageName);
            $post->img = 'uploads/post/' . $imageName;
        }
        if($post->save()){
			return Redirect::back()->with('msg_post', 'Post Added!');
        }
		
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
