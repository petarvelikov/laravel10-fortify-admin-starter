<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        
        return view('admin.products.index', compact('products'));
    }


    public function create()
    {
        $categories = DB::table('categories')->get();

        return view('admin.products.create')->with('categories', $categories);
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:products|max:25',
            'description' => 'required',
            'price' => 'required',
            'category_id' => 'required',
        ]);

        Product::create($request->all());

        return redirect('/admin/products')->with('success','Product created successfully.');
    }


    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    
    public function edit(Product $product)
    {
        $categories = DB::table('categories')->get();

        return view('admin.products.edit', compact('product', 'categories'));
    }


    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => [
                'required',
                'max:25',
                Rule::unique('products')->ignore($product),
            ],
            'description' => 'required',
            'price' => 'required',
            'category_id' => 'required',
        ]);

        $product->update($request->all());

        return redirect('/admin/products')->with('success','Product updated successfully.');
    }


    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('success','Product deleted successfully');
    }

}
