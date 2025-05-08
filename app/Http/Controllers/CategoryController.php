<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $search = request('search');
        $query = Category::query();

        if ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        $categories = $query->paginate(5);
        return view('admin.categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
            ]);

            Category::create([
                'name' => $request->name,
            ]);

            return redirect()->back()->with('success', 'Category created successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->update([
                'name' => $request->name,
            ]);

            return redirect()->back()->with('success', 'Category updated successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function destroy($id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->delete();
            return redirect()->back()->with('success', 'Category deleted successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
}
