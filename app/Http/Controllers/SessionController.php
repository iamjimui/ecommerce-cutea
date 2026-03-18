<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class SessionController extends Controller
{
    public function show()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        
        $credentials = $request->only('email', 'password');
    //dd($credentials);
        if (Auth::attempt($credentials)) {
 
            return redirect()->intended('home');
        }
 
        return back()->withErrors([
            'message' => 'The provided credentials do not match our records.',
        ]);
    }
}
