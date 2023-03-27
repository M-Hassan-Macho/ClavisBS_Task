<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Dashboard\RegisterRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $validated=auth()->attempt([
            'email'=>$request->email,
            'password'=>$request->password,
            
        ],$request->password);

        if($validated){
            return redirect()->route('dashboard')->with('success','Login Successfull');
        }

        return redirect()->route('login')->with('success', 'You Credintials Are Not Valid !');
    }

    public function logout()
    {
        Session::flush();

        Auth::logout();

        return Redirect('login');
    }
}
