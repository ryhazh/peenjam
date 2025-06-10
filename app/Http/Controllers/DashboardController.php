<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Record;
use App\Models\User;
use Carbon\Carbon;
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

            // Item Types (count of distinct item definitions)
            $itemTypeCount = Item::count();

            // Total Loan Records (all loan records ever, regardless of status or return)
            $totalRecordCount = Record::count();

            // Pending Loans (records awaiting approval and not yet returned)
            $pendingUnreturnedCount = Record::where('is_approved', 'Pending')
                ->whereNull('returned_at')
                ->count();

            // Rejected Loans (rejected records that are not yet returned)
            $rejectedUnreturnedCount = Record::where('is_approved', 'Rejected')
                ->whereNull('returned_at')
                ->count();

            return view('shared.dashboard.index', [
                'userCount' => $userCount,
                'itemTypeCount' => $itemTypeCount,
                'totalRecordCount' => $totalRecordCount,
                'pendingUnreturnedCount' => $pendingUnreturnedCount,
                'rejectedUnreturnedCount' => $rejectedUnreturnedCount,
            ]);
        }

        // For non-admin users, if you have a different dashboard view, specify it here.
        // Otherwise, it might just be an empty dashboard or redirect to a user-specific page.
        return view('shared.dashboard.index'); // Or whatever is appropriate for non-admins
    }
}
