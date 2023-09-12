<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authcontroller extends Controller
{
    public function store(Request $request){
   /*     $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required',
        ],
        [
            'email.required' => 'email is must.',
            'password.required' => 'password is must.',
            'email.exists'=>'wrong email',
        ]
    );*/
       if(!Auth::guard('admin')->attempt($request->only('email','password'))){
        return redirect()->back()->with('error','Invalid Credentials');
       };
       return redirect()->intended(route('admin.home'));
    }

    public function destroy(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
