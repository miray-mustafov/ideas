<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function store(){
        // dump($_POST); the vanilla php way

        // $idea=new Idea([
        //     'content'=> request()->get('idea', ''),
        // ]);
        // $idea->save();

        $idea= Idea::create([
            'content'=> request()->get('idea', ''),// getting the current idea content from user
        ]);

        return redirect()->route('dashboard');

    }
}
