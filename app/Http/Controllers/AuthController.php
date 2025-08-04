<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(){
        return view('register');
    }

    public function doRegister(Request $request){
        $request->validate([
            'name'=> 'required | max:30',
            'email' => 'required | email | unique:users',
            'password' => 'required | min:6 | confirmed'
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]
        );
        return back()->with('success',true);
    }

    public function login(){
        return view('login');
    }

    public function doLogin(Request $request){
        $request->validate([
            'email' => 'required | email ',
            'password' => 'required | min:6'
        ]);
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            return redirect()->intended('/');
        }
        return back()->with('err-login',true);
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
