<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('admin.categories.index', compact('categories'));
    }


    public function create()
    {
        return view('admin.categories.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories|max:25'
        ]);

        Category::create($request->all());

        return redirect('/admin/categories')->with('success','Category created successfully.');
    }


    public function show(Category $category)
    {
        abort(404);
    }


    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }



    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => [
                'required',
                'max:25',
                Rule::unique('categories')->ignore($category),
            ]
        ]);

        $category->update($request->all());

        return redirect('/admin/categories')->with('success', 'Category updated successfully.');
    }


    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index');
    }

}
