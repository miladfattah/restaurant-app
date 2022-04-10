<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index' , compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        $image = $request->file('image')->store('public/categories');
        Category::create([
            'name' => $request->name, 
            'description' => $request->description , 
            'image' => $image 
        ]);
        return to_route('admin.categoreis.index')->with('success' , 'Category created');
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
    public function edit(Category $categorei)
    {
        return view('admin.categories.edit' , compact('categorei'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $categorei)
    {
        $request->validate([
            'name' => 'required' , 
            'description' => 'required' , 
        ]);

        $image = $categorei->image ; 
        if($request->hasFile('image')){
            Storage::delete($categorei->image);
            $image = $request->file('image')->store('public/categories');
        }

        $categorei->update([
            'name' => $request->name , 
            'description' => $request->description , 
            'image' => $image 
        ]);

        return to_route('admin.categoreis.index')->with('warning' , 'Category Edited');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $categorei)
    {
        Storage::delete($categorei->image);
        $categorei->delete();

        return to_route('admin.categoreis.index')->with('danger' , 'Category Deleted');
    }
}
