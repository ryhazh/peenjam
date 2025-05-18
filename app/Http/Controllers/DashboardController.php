<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\User;
use App\Models\Record;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{


    public function index()
    {
        $user = auth()->user();

        if ($user->role->name === 'admin') {
            $userCount = User::count();
            $itemCount = Item::count();

            $activeBorrowedCount = Record::where('is_approved', 'Approved')
                ->whereNull('returned_at')
                ->count();

            $totalRecordCount = Record::count();

            $borrowedCount = Record::whereNull('returned_at')
                ->where('due_date', '>=', now())
                ->where('is_approved', 'Approved')
                ->count();

            $overdueCount = Record::whereNull('returned_at')
                ->where('due_date', '<', now())
                ->where('is_approved', 'Approved')
                ->count();

            $returnedCount = Record::whereNotNull('returned_at')
                ->where('is_approved', 'Approved')
                ->count();

            $rejectedCount = Record::where('is_approved', 'Rejected')->count();

            $labels = [];
            $borrowedData = [];
            $returnedData = [];

            for ($i = 6; $i >= 0; $i--) {
                $date = Carbon::today()->subDays($i);
                $labels[] = $date->toDateString();

                $borrowedData[] = Record::whereDate('created_at', $date)
                    ->where('is_approved', 'Approved')
                    ->count();

                $returnedData[] = Record::whereDate('returned_at', $date)
                    ->where('is_approved', 'Approved')
                    ->count();
            }

            return view('shared.dashboard.index', [
                'userCount' => $userCount,
                'itemCount' => $itemCount,
                'activeBorrowedCount' => $activeBorrowedCount,
                'totalRecordCount' => $totalRecordCount,
                'borrowedCount' => $borrowedCount,
                'overdueCount' => $overdueCount,
                'returnedCount' => $returnedCount,
                'rejectedCount' => $rejectedCount,

                'areaChartLabels' => $labels,
                'areaChartSeries' => [
                    [
                        'name' => 'Borrowed',
                        'data' => $borrowedData
                    ],
                    [
                        'name' => 'Returned',
                        'data' => $returnedData
                    ]
                ]
            ]);
        }
        // else if ( wip )

        return view('shared.dashboard.index');
    }
}
