<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categorys = Category::orderBy('created_at', 'desc')->simplePaginate(5);
        return view('admin.category.index', compact('categorys',));
    }

    public function create(Request $request)
    {
        return view('admin.category.create', []);
    }
    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category',));
    }

    public function store(Request $request)
    {
        $title = $request->input('category');
        $category = new Category();
        $category->title = $title;
        $category->save();
        return redirect()->route('category.create');
    }

    public function update(Request $request, Category $category)
    {
        $title = $request->input('category');
        $category->update(['title' => $title]);

        return redirect()->route('category.edit', $category->id)
            ->with('success', 'Категория обновлена');
    }

    public function delete(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index')
            ->with('success', 'Category deleted successfully');
    }
}
