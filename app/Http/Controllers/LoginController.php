<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(){
        return view('login');
    }
    public function register(){
        return view('register');
    }
    public function auth(Request $request){
        $credential = $request->only(['username','password']);
        if (Auth::attempt($credential)) {
            if (Auth::user()->level == 'admin') {
                return redirect()->intended('/dshboard');
            }elseif(Auth::user()->level == 'member'){
                return redirect()->intended('/');
            }else {
                return redirect()->intended('/login');
            }
        }else{
            return back();
        }
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
