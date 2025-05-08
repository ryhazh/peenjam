<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::with('category')->paginate(5);
        return view('admin.items.index', compact('items'));
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

            return redirect()->back()-with('success', 'Item updated successfully');
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
