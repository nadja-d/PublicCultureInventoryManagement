<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
    
        $user = DB::select('CALL validateLogin(?, ?)', [$username, $password]);
    
        if ($user) {
            return redirect()->route('product');
        } else {
            return redirect()->route('login')->with('error', 'Invalid credentials');
        }
    }    
    
}
