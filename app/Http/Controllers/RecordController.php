<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\User;
use App\Models\Record;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    public function index()
    {
        $status = request('status', 'all');
        $search = request('search');
        $filter = request('filter', 'all');
        
        $query = Record::query();
        
        // Status filter
        if ($status !== 'all') {
            if ($status === 'returned') {
                $query->whereNotNull('returned_at');
            } elseif ($status === 'overdue') {
                $query->whereNull('returned_at')
                      ->where('due_date', '<', now());
            } elseif ($status === 'borrowed') {
                $query->whereNull('returned_at')
                      ->where('due_date', '>=', now());
            }
        }

        // Search by username
        if ($search) {
            $query->whereHas('user', function($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%');
            });
        }

        // Date filter
        if ($filter !== 'all') {
            $date = now();
            if ($filter === '7') {
                $date = $date->subDays(7);
            } elseif ($filter === '31') {
                $date = $date->subDays(31);
            } elseif ($filter === '3') {
                $date = $date->subMonths(3);
            }
            $query->where('borrowed_at', '>=', $date);
        }
        
        $records = $query->paginate(5);
        $users = User::all();
        $items = Item::all();
        
        return view('admin.records.index', compact('records', 'users', 'items'));
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

    public function destroy(Record $record)
    {
        try {
            $record->delete();
            return redirect()->route('admin.records.index')->with('success', 'Record deleted successfully');
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
