<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller {
    //
    public function index() {

        $products = Product::all();
        return view('admin.pages.Product.index')->with('products', $products);
    }
    public function create() {
        $categories = Category::all();
        return view('admin.pages.Product.add')->with('categories', $categories);
    }
    public function store(Request $request) {
        $validatedData = $request->validate([
            'name'        => 'required|unique:products|max:255',
            'description' => 'required',
            'price'       => 'required|integer',
            'category_id' => 'required|exists:products',
        ]);
        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        if ($product->save()) {
            return redirect()->back()->with('success', 'Product inserted successfully');
        }

    }
    public function edit(Product $product) {
        $categories = Category::all();

        return view('admin.pages.Product.edit')->with('product', $product)->with('categories', $categories);
    }

    public function update(Request $request, Product $product) {
        $validatedData = $request->validate([
            'name'        => 'required|unique:products|max:255',
            'description' => 'required',
            'price'       => 'required|integer',
            'category_id' => 'required|exists:products',
        ]);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        if ($product->save()) {
            return redirect()->back()->with('success', 'Product updated successfully');
        }

    }
    public function destroy(Product $product) {
        $product->delete();
        return redirect()->back()->with('success', 'Product deleted successfully');
    }
}
