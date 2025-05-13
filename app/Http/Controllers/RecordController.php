<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\User;
use App\Models\Record;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecordController extends Controller
{
    public function index()
    {
        $status = request('status', 'all');
        $search = request('search');
        $filter = request('filter', 'all');

        $query = Record::query();

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

        if ($search) {
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%');
            });
        }

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

        $records = $query->latest()->paginate(5);
        $users = User::where('role_id', 3)->get();
        $items = Item::all();

        return view('admin.records.index', compact('records', 'users', 'items'));
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'user_id'   => 'required|integer',
                'item_id'   => 'required|integer',
                'quantity'  => 'required|integer',
                'due_date'  => 'required|date',
                'reason'    => 'required|string|max:255',
            ]);

            $validated['borrowed_at'] = now();
            $validated['actions_by'] = Auth::id();

            Record::create($validated);

            return redirect()
                ->route('records.index')
                ->with('success', 'Record created successfully.');
        } catch (\Throwable $e) {
            return redirect()
                ->back()
                ->withErrors(['error' => $e->getMessage()])
                ->withInput();
        }
    }


    public function show(Record $record)
    {
        $records = Record::latest()->paginate(5);
        $users = User::all();
        $items = Item::all();

        return view('admin.records.index', compact('records', 'users', 'items'));
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
            $validated = $request->validate([
                'user_id'   => 'required|integer',
                'item_id'   => 'required|integer',
                'quantity'  => 'required|integer',
                'due_date'  => 'required|date',
                'reason'    => 'required|string|max:255',
            ]);

            $validated['returned_at'] = $request->boolean('returned') ? now() : null;
            $validated['actions_by']  = Auth::id();

            $record->update($validated);

            return redirect()
                ->route('records.index')
                ->with('success', 'Record updated successfully.');
        } catch (\Throwable $e) {
            return redirect()
                ->back()
                ->withErrors(['error' => $e->getMessage()])
                ->withInput();
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
}
