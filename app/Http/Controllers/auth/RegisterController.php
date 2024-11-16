<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function showRegisterForm(){
        return view('auth.register');
    }
    public function store(Request $request){
        //validate the form
        $request->validate([
            'name' =>'required|string|max:255',
            'username' =>'required|string|max:255',
            'email' =>'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
        //create a new user
        $newUser = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        //redirect to home page
        return redirect()->route('auth.login');
    }
}
