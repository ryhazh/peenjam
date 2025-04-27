<?php

namespace App\Http\Controllers;

use App\Models\Record;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    public function index()
    {
        $records = Record::all();
        return view('admin.records.index', compact('records'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'user_id' => 'required|integer',
                'item_id' => 'required|integer',
                'quantity' => 'required|integer',
                'borrowed_at' => 'required|date',
                'due_date' =>'required|date',
                'returned_at' => 'required|date',
                'reason' =>'required|string|max:255',
            ]);

            Record::create($request->all());
            return redirect()->route('admin.records.index')->with('success', 'Record created successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors($th->getMessage());
        }
    }

    public function update(Request $request, Record $record)
    {
        try {
            $request->validate([
                'user_id' => 'required|integer',
                'item_id' => 'required|integer',
                'quantity' => 'required|integer',
                'borrow_date' => 'required|date',
                'return_date' => 'required|date',
                'status' => 'required|string|max:255',
            ]);

            $record->update($request->all());
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors($th->getMessage());
        }
    }

    public function return(Request $request, Record $record)
    {
        try {
            $record->update([
                'status' => 'returned',
                'return_date' => now(),
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors($th->getMessage());
        }
    }

    public function accept(Request $request, Record $record)
    {
        try {
            $record->update([
                'status' => 'accepted',
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors($th->getMessage());
        }
    }

    public function reject(Request $request, Record $record)
    {
        try {
            $record->update([
                'status' => 'rejected',
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors($th->getMessage());
        }
    }
}
