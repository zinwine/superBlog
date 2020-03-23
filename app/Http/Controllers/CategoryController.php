<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return response()->json([
            'categories' => $categories
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
        // $category = New Category();
        // $category->cat_name = $request->cat_name;
        // $category->save();

        $this->validate($request, [
            'cat_name' => 'required| min:3| max:50'
        ]);

        $cat_name = $request->cat_name;

        Category::create([
            'cat_name' => $cat_name
        ]);
        return ['message' => 'OK, Category Saved'];
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
        $category = Category::find($id);
        return response()-> json([
            'category' => $category 
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
            'cat_name' => 'required| min:3| max:50'
        ]);

        $category = Category::where('id', $id)->firstOrFail();
        $category->cat_name = $request->cat_name;
        // $category->save(); // Same Same
        $category->update();
        
        return ['message' => 'OK, Category Updated'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return ['message', 'Category Deleted Succefully'];
    }

    public function selectDelete($id)
    {
        $id_ary = explode(',', $id);
        foreach($id_ary as $id){
            $category = Category::find($id);
            $category->delete();
        }
        return ['message', 'Category Deleted Succefully'];
    }
}
