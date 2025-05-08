<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth; 

class AuthController extends Controller
{
    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('items.index'); 
        } else {
            return redirect()->back()->withErrors('Invalid credentials');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
