<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLoginForm(){
        return view('auth.login');
    }
    public function login(Request $request){
        $this->validate($request,[
            'email' =>'required|email',
            'password' => 'required|min:8'
        ]);
        if(auth()->attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->route('todos.index');
        }
        return back()->withErrors(['message' => 'Invalid Credentials']);
    }
}
