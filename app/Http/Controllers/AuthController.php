<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function     register(){
        return view('auth.register');
    }
    public function store(){
        $validated = request()->validate([
            'name' => 'required|min:3|max:40',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed' //! in the template name the conf_pass as password_confirmation !
        ]);
        // Laravel has default bcrypt hashing for the password, below code not necessary
        $validated['password'] = Hash::make($validated['password']);

        User::create($validated);
        return redirect()->route('dashboard')->with('success', 'Registration Successful!');
    }
    public function login(){
        return view('auth.login');
    }
    public function authenticate(){
        $validated = request()->validate([
            'email' => 'required|email',
            'password' => 'required|min:8' //! in the template name the conf_pass as password_confirmation !
        ]);

        // It compares the hashed versions of the password using the same algorithm as the one on registration
        $authenticated = auth()->attempt($validated); //or Auth::attempt($validated);

        if($authenticated){
            request()->session()->regenerate();
            return redirect()->route('dashboard')->with('success', 'Login Successful!');
        }

        return redirect()->route('login',['email'=>request()->email])->withErrors(['email' => 'Login Failed!']);
    }

    public function logout(){
        //clearing sessions and cookies
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('dashboard')->with('success', 'Logout Successful!');
    }

}
