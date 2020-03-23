<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class BlogPostController extends Controller
{
    public function index()
    {
        // $posts = Post::orderBy('id', 'desc')->get();
        $posts = Post::with('category', 'user')->orderBy('id', 'desc')->get();
        // $posts = Post::all();
        return response()->json([
            'blogPosts' => $posts
        ], 200);
    }

    public function detail($id)
    {
        // $posts = Post::orderBy('id', 'desc')->get();
        $detailPosts = Post::where('id', $id)->with('category', 'user')->orderBy('id', 'desc')->first();
        // $posts = Post::all();
        return response()->json([
            'detailBlogPost' => $detailPosts
        ], 200);
    }

    public function categories()
    {
        $categories = Category::all();
        return response()->json([
            'categories' => $categories
        ], 200);
    }

    public function categorPosts($id)
    {
        $posts = Post::with('category', 'user')->where('cat_id', $id)->orderBy('id', 'desc')->get();
        return response()->json([
            'categorPosts' => $posts
        ], 200);
    }

    public function searchPosts(Request $request)
    {
        $search = $request->get('s');
        if($search != null){
            $posts = Post::with('category', 'user')
            ->where('title', 'LIKE', "%$search%")
            ->orWhere('description', 'LIKE', "%$search%")->get();
            return response()->json([
                'searchPosts' => $posts
            ], 200);
        }else{
            return $this->index();
        }
        // return $search;
    }

    public function latestPost()
    {
        // $posts = Post::orderBy('id', 'desc')->get();
        $posts = Post::with('category', 'user')->orderBy('id', 'desc')->get();
        // $posts = Post::all();
        return response()->json([
            'latestPost' => $posts
        ], 200);
    }
}
