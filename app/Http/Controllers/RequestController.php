<?php

namespace App\Http\Controllers;

use App\Models\Record;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function accept(Request $request, $id)
    {
        try {
            $record = Record::findOrFail($id);

            $record->update([
                'status' => 'accepted',
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors($th->getMessage());
        }
    }

    public function reject(Request $request, $id)
    {
        try {
            $record = Record::findOrFail($id);
            $record->update([
                'status' => 'rejected',
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors($th->getMessage());
        }
    }
}
