<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller {

    public function index() {

        $categories = Category::all();
        return view('admin.pages.category.index')->with('categories', $categories);
    }
    public function create() {

        return view('admin.pages.category.add');
    }
    public function store(Request $request) {
        $category = new Category;
        $category->name = $request->name;
        $category->description = $request->description;
        $category->active = $request->active;
        if ($category->save()) {
            return redirect()->back()->with('success', 'Category inserted successfully');
        }

    }
    public function edit(Category $category) {

        return view('admin.pages.category.edit')->with('category', $category);
    }

    public function update(Request $request, Category $category) {
        $category->name = $request->name;
        $category->description = $request->description;
        $category->active = $request->active;
        if ($category->save()) {
            return redirect()->back()->with('success', 'Category updated successfully');
        }

    }
    public function destroy(Category $category) {
        $category->delete();
        return redirect()->back()->with('success', 'Category deleted successfully');
    }
}
