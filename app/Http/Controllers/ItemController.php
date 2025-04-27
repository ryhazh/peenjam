<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();
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
            ]);
            Item::create([
                'name' => $request->name,
                'description' => $request->description,
                'quantity' => $request->quantity,
                'category_id' => $request->category_id,
            ]);
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
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
}
