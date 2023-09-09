<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        return view('category.index', compact('categories'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'   => 'required|unique:categories,name|string|max:255',
            'status' => 'required|in:active,inactive'
        ]);

        $category = new Category();
        $category->name   = $request->name;
        $category->status = $request->status;
        $category->save();

        return redirect()->route('admin.category.index')->with('msg', 'Category created successfully.');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'   => 'required|unique:categories,name|string|max:255',
            'status' => 'required|in:active,inactive'
        ]);

        $category = Category::findOrFail($id);
        $category->name   = $request->name;
        $category->status = $request->status;
        $category->save();

        return redirect()->route('admin.category.index')->with('msg', 'Category updated successfully.');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.category.index')->with('msg', 'Category deleted successfully.');
    }

    public function changeStatus($id, $status)
    {
        $category = Category::findOrFail($id);
        $category->status = $status;
        $category->save();

        return redirect()->route('admin.category.index')->with('msg', 'Category status updated successfully.');
    }
}
