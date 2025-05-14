<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Record;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequestController extends Controller
{

    public function index(Request $request)
    {
        $user = Auth::user();
        $query = Record::query();

        if ($user->role->name === 'user') {
            $query->where('user_id', $user->id);
        }

        $search = $request->query('search');
        $filter = $request->query('filter', 'all');
        $status = $request->query('status', 'pending');

        if (in_array($status, ['pending', 'rejected', 'approved'])) {
            $query->where('is_approved', $status);
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

        $requests = $query->latest()->paginate(5);
        $items = Item::all();


        return view('shared.requests.index', compact('requests', 'items'));
    }



    public function store(Request $request)
    {
        try {
            $request->validate([
                'item_id' => 'required|exists:items,id',
                'quantity' => 'required|integer|min:1',
                'due_date' => 'required|date|after:borrowed_at',
                'reason' => 'required|string',
            ]);

            Record::create([
                'user_id' => Auth::id(),
                'item_id' => $request->item_id,
                'quantity' => $request->quantity,
                'borrowed_at' => now(),
                'due_date' => $request->due_date,
                'reason' => $request->reason,
                'is_approved' => 'Pending'
            ]);

            return redirect()->back()->with('success', 'Request submitted successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors($th->getMessage());
        }
    }

    public function accept(Request $request, $id)
    {
        try {
            $record = Record::findOrFail($id);
            $record->update([
                'is_approved' => 'approved',
                'actions_by' => Auth::id(),
            ]);
            return redirect()->back()->with('success', 'Request approved.');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors($th->getMessage());
        }
    }

    public function reject(Request $request, $id)
    {
        try {
            $record = Record::findOrFail($id);
            $record->update([
                'is_approved' => 'rejected',
                'actions_by' => Auth::id(),
            ]);
            return redirect()->back()->with('success', 'Request rejected.');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors($th->getMessage());
        }
    }
}
