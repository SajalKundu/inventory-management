<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index($id)
    {
        $subCategories = SubCategory::where('category_id', $id)->get();
        $category = Category::findOrFail($id);
        return view('sub-category.index', compact('subCategories', 'category'));
    }

    public function create($id)
    {
        $category = Category::findOrFail($id);
        return view('sub-category.create', compact('category'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:sub_categories,name|string|max:255',
            'status' => 'required|in:active,inactive',
        ]);

        $subcategory              = new SubCategory();
        $subcategory->category_id = $request->category_id;
        $subcategory->name        = $request->name;
        $subcategory->status      = $request->status;
        $subcategory->save();

        return redirect()->route('admin.sub-category.index', $request->category_id)->with('msg', 'Sub Category created successfully.');
    }

    public function edit($id)
    {
        $subcategory = SubCategory::findOrFail($id);
        $category = Category::findOrFail($subcategory->category_id);
        return view('sub-category.edit', compact('subcategory', 'category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:sub_categories,name,' . $id,
            'status' => 'required|in:active,inactive',
        ]);

        $subcategory              = SubCategory::findOrFail($id);
        $subcategory->name        = $request->name;
        $subcategory->status      = $request->status;
        $subcategory->save();

        return redirect()->route('admin.sub-category.index', $subcategory->category_id)->with('msg', 'Sub Category updated successfully.');
    }

    public function destroy($id)
    {
        $subcategory = SubCategory::findOrFail($id);
        $subcategory->delete();
        return redirect()->route('admin.sub-category.index', $subcategory->category_id)->with('msg', 'Sub Category deleted successfully.');
    }

    public function changeStatus($id, $status)
    {
        $subcategory = SubCategory::findOrFail($id);
        $subcategory->status = $status;
        $subcategory->save();
        return redirect()->route('admin.sub-category.index', $subcategory->category_id)->with('msg', 'Sub Category status updated successfully.');
    }
}
