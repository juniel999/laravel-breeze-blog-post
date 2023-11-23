<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user-posts/index',[
            'posts' => Post::orderBy('created_at', 'desc')->with(['tags','user'])->paginate(3)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user-posts/create', [
            'categories' => Category::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tags' => 'required'
        ]);

        $imageName = null;
        //checking and getting the image if exists
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName(); // Generating a unique name for the image
    
            // Store the uploaded file in the 'uploads' folder
            $image->storeAs('uploads', $imageName, 'public');
        }
    
         // Create the post and associate it with the authenticated user
         $postData = [
            'user_id' => Auth::id(),
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'image' => $imageName,
            'category_id' => $validatedData['category'],
        ];

        $post = Post::create($postData);
        $tags = explode(',', $validatedData['tags']);
        foreach($tags as $tag) {
            $post->tags()->create([
                'name' => $tag,
            ]);
        }

        return redirect()->route('user-posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $comments = Post::find($post->id)->comments()
            ->with(['replies' => function ($query) {
                $query->with('user');
            }])
            ->with('user')
            ->get();

        return view('user-posts/show', [
            'post' => $post,
            'comments' => $comments
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('user-posts/edit',[
            'post'=> $post,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'category' => 'required',
            'tags' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);

        $post->update([
            'title' => $validatedData['title'],
            'category' => $validatedData['category'],
            'description' => $validatedData['description'],
            'tags' => $validatedData['tags'],
        ]);

        return redirect()->route('user-posts.show', $post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->tags()->delete();
        $post->delete();

        return redirect()->route('user-posts.index');
    }
}
