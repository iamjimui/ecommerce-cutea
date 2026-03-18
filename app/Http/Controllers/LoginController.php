<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display login page.
     * 
     * @return Renderable
     */
    public function show()
    {
        return view('login');
    }

    /**
     * Handle account login request
     * 
     * @param Request $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $credentials = ["email" => $request->email, 'password' => $request->password];
        
        if(!Auth::validate($credentials)):
            return redirect()->to('login')
                ->withErrors(trans('failed'));
        endif;


        
        $user = Auth::getProvider()->retrieveByCredentials($credentials);
        Auth::login($user);

        if(auth()->user()->role_id > 0) {
            return redirect()->intended('home');
        } else {
            return redirect()->intended('commandes');
        }
        
    }
}