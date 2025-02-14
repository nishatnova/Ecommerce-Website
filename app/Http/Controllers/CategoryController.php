<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        return view('admin.category.index', [
            'categories' => Category::all()
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.add');
    }
    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required'
        ],[
            'name.required'         => 'Category name field is required',
        ]);
        Category::newCategory($request);
        return back()->with('message', 'Category info create successfully.');
    }
    /**
     * Display the specified resource.
     */

    public function show(Category $category)
    {
        return view('admin.category.show', ['category' => $category]);
    }


    /**
     * Show the form for editing the specified resource.
     */


    public function edit(Category $category)
    {
        return view('admin.category.edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, Category $category)
    {
        Category::updateCategory($request, $category);
        return redirect('/category')->with('message', 'category info update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */


    public function destroy(Category $category)
    {
        Category::deleteCategory($category);
        return back()->with('message','delete Category Successfully');
    }

}
