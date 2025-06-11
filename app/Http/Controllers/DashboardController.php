<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Item;
use App\Models\User;
use App\Models\Record;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if (!$user) {
            return redirect('/login')->with('error', 'You need to be logged in to view the dashboard.');
        }

        if ($user->role->name === 'admin') {
            $userCount = User::count();

            $itemTypeCount = Item::count();

            $totalRecordCount = Record::count();

            $pendingUnreturnedCount = Record::where('is_approved', 'Pending')
                ->whereNull('returned_at')
                ->count();

            $rejectedUnreturnedCount = Record::where('is_approved', 'Rejected')
                ->whereNull('returned_at')
                ->count();

            $categories = Category::all();

            $users = User::where('role_id', 3)->get();
            $items = Item::all();


            return view('shared.dashboard.index', [
                'userCount' => $userCount,
                'itemTypeCount' => $itemTypeCount,
                'totalRecordCount' => $totalRecordCount,
                'pendingUnreturnedCount' => $pendingUnreturnedCount,
                'rejectedUnreturnedCount' => $rejectedUnreturnedCount,
                'categories' => $categories,
                'users' => $users,
                'items' => $items
            ]);
        }

        return view('shared.dashboard.index');
    }
}
