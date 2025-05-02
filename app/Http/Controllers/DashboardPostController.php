<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.posts.index', [
            'posts' => Post::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.posts.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // return $request->file('image')->store('post-images');

        $validatedData = $request->validate([
            "title" => ['required','min:5', 'max:255', 'unique:posts'],
            "slug" => ['required', 'unique:posts'],
            "category_id" => "required",
            "image" => ['image', 'file', 'max:1024'],
            "body" => "required",
        ]);
        
        if($request->file('image')) {
            $validatedData["image"] = $request->file('image')->store('post-images');
        }

        $validatedData["user_id"] = Auth::id();
        $validatedData["excerpt"] = Str::limit(strip_tags($request->body), 100, '...');

        Post::create($validatedData);

        return redirect('/dashboard/posts')->with('success', 'Post ' . $validatedData['title'] . ' has been created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('backend.posts.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('backend.posts.edit', [
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $validatedData = $request->validate([
            "title" => ['required','min:5', 'max:255', Rule::unique('posts')->ignore($post->id)],
            "slug" => ['required', Rule::unique('posts')->ignore($post->id)],
            "category_id" => "required",
            "image" => ['image', 'file', 'max:1024'],
            "body" => "required",
        ]);
        
        if($request->file('image')) {
            if ($post->image != null) Storage::delete($post->image);
            $validatedData["image"] = $request->file('image')->store('post-images');
        }

        // $validatedData["user_id"] = auth()->user()->id;
        $validatedData["excerpt"] = Str::limit(strip_tags($request->body), 100, '...');

        Post::where('id', $post->id)->update($validatedData);

        return redirect('/dashboard/posts')->with('success', 'Post ' . $validatedData['title'] . ' has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect('/dashboard/posts')->with('success', 'Post ' . $post->name . ' has been deleted.');
    }
}
