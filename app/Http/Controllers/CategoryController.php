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
}
