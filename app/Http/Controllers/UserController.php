<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }


    public function edit(User $user)
    {
        if(auth()->id() !== $user->id){
            abort(403);
        }
        $editing = true;
        return view('users.show', compact('user','editing'));
    }


    public function update(User $user)
    {
        if(auth()->id() !== $user->id){
            abort(403);
        }
    }

}
