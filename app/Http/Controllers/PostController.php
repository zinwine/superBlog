<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\User;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function allPosts()
    {
        // $allPosts = User::with('posts')->get();
        // return $allPosts;
        // $allPosts = Category::with('posts')->get();
        // return $allPosts;
        $allPosts = Post::with('category', 'user')->get();
        return $allPosts;
    }

    public function index()
    {
        // $posts = Post::orderBy('id', 'desc')->get();
        $posts = Post::with('category', 'user')->orderBy('id', 'desc')->get();
        // $posts = Post::all();
        return response()->json([
            'posts' => $posts
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'title' => 'required| min:3| max:50',
        //     ''
        // ]);

        $title = $request->title;
        $description = $request->description;
        $cat_id = $request->cat_id;
        $user_id = Auth::user()->id;

        // return $title . $description . $cat_id . $user_id;

        Post::create([
            'title' => $title,
            'description' => $description,
            'cat_id' => $cat_id,
            'user_id' => $user_id
        ]);
        return ['message' => 'OK, Post Saved'];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return response()-> json([
            'post' => $post 
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return ['message', 'Post Deleted Succefully'];
    }
}
