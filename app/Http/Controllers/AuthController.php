<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function getLogin(){
        return view('login');
    }
    public function postLogin(Request $request)
    {
        $customer = $request->only(['email', 'password']);
        // dd($customer);
        if (Auth::attempt($customer)) {

            // $request->session()->regenerate();

            return redirect()->route('admin.index');
        } else {
            return redirect()->back()->with('message', 'Email hoang Password khong ton tai');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}