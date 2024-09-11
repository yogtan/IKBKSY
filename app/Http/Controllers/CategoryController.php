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
        $categories = Category::all();

        return view('admin.category.index', [
            'title' => 'Category - IKBKSY',
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.category.add-category', [
            'title' => 'Category - IKBKSY',
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'newCategory' => 'required'
        ]);

        Category::create([
            'category' => $request->newCategory,
        ]);

        if ($request->source === 'addBlogPage') {
            return redirect()->route('addBlog')->with('success', 'Success add category !');
        } else {
            return redirect()->route('category')->with('success', 'Success add category !');
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
        $category = Category::find($id);

        return view('admin.category.edit-category', [
            'title' => 'Category - IKBKSY',
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'category' => 'required'
        ]);

        $category = Category::find($id);

        $category->category = $request->category;

        $category->update();

        return redirect()->route('category')->with('success', 'Success update category !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);

        $category->delete();

        return redirect()->route('category')->with('success', 'Sucess delete category !');
    }
}
