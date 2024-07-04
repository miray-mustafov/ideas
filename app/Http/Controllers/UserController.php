<?php

namespace App\Http\Controllers;
use App\Models\Idea;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function show(User $user)
    {
        $ideas = $user->ideas()->paginate(4);
        return view('users.show', compact('user', 'ideas'));
    }


    public function edit(User $user)
    {
        if(auth()->id() !== $user->id){
            abort(403);
        }
        $ideas = $user->ideas()->paginate(4);
        $editing = true;
        return view('users.show', compact('user','editing', 'ideas'));
    }


    public function update(User $user)
    {
        if(auth()->id() !== $user->id){
            abort(403);
        }
    }

}
