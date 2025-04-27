<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'phone' =>'required|string|max:255',
                'email' => 'required|email|unique:users',
                'password' => 'required|string|min:6',
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function update(Request $request, $id) {
        try {
            $user = User::find($id);

            $request->validate([
                'name' =>'required|string|max:255',
                'phone' =>'required|string|max:255',
                'email' =>'required|email|unique:users,email,'.$id,
                'password' =>'required|string|min:6',
            ]);

            $user->update($request->all());
            return redirect()->back()->with('success', 'User updated successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
