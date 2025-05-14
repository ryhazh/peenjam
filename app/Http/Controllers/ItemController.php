<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $search = request('search');
        $categoryId = request('category_id');
        $query = Item::with('category');

        $categories = Category::all();

        if ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        if ($categoryId) {
            $query->where('category_id', $categoryId);
        }

        $items = $query->paginate(5);
        return view('shared.items.index', compact('items', 'categories'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'required|string',
                'quantity' => 'required|integer|min:0',
                'category_id' => 'required|exists:categories,id',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);
            $data = [
                'name' => $request->name,
                'description' => $request->description,
                'quantity' => $request->quantity,
                'category_id' => $request->category_id,
            ];

            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('items', 'public');
                $data['image'] = $imagePath;
            }

            Item::create($data);
            return redirect()->route('items.index')->with('success', 'Item created successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $item = Item::findOrFail($id);
            $item->update([
                'name' => $request->name,
                'description' => $request->description,
                'quantity' => $request->quantity,
                'category_id' => $request->category_id,
            ]);

            return redirect()->back() - with('success', 'Item updated successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function destroy($id)
    {
        try {
            $item = Item::findOrFail($id);
            $item->delete();
            return redirect()->back()->with('success', 'Item deleted successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
}
