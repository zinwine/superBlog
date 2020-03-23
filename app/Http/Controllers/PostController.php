<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\User;
use Illuminate\Support\Facades\Auth;
use Image;

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
        $this->validate($request, [
            'title' => 'required| min:3| max:50',
            'description' => 'required| min:5',
            'cat_id' => 'required',
        ]);

        $strpos = strpos($request->photo, ';');
        $sub = substr($request->photo, 0, $strpos);
        $ex = explode('/', $sub)[1];
        $name = time() . "." . $ex;
        $img = Image::make($request->photo)->resize(200, 200);
        $upload_path = public_path() . "/uploads/";
        $img->save($upload_path . $name);

        $title = $request->title;
        $description = $request->description;
        $cat_id = $request->cat_id;
        $user_id = Auth::user()->id;

        // return $title . $description . $cat_id . $user_id;

        Post::create([
            'title' => $title,
            'description' => $description,
            'cat_id' => $cat_id,
            'user_id' => $user_id,
            'photo' => $name
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
        $this->validate($request, [
            'title' => 'required| min:3| max:50',
            'description' => 'required| min:5',
            'cat_id' => 'required',
        ]);

        $post = Post::where('id', $id)->firstOrFail();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->cat_id = $request->cat_id;
        $post->user_id = Auth::user()->id;

        if($post->photo == $request->photo){
            $name = $request->photo;
        }else{
            $strpos = strpos($request->photo, ';');
            $sub = substr($request->photo, 0, $strpos);
            $ex = explode('/', $sub)[1];
            $name = time() . "." . $ex;
            $img = Image::make($request->photo)->resize(200, 200);
            $upload_path = public_path() . "/uploads/";

            $photo = $upload_path . $post->photo;
            if(file_exists($photo)){
                @unlink($photo);
            }

            $img->save($upload_path . $name);

        }
        
        $post->photo = $name;

        // $post->save(); // Same Same
        $post->update();

        return ['message' => 'OK, Post Saved'];
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
        $photo_path = public_path() . "/uploads/";
        $photo = $photo_path . $post->photo;
        if(file_exists($photo)){
            @unlink($photo);
        }
        $post->delete();
        return ['message', 'Post Deleted Succefully'];
    }
}
