<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function show(Idea $idea){
        // Laravel automatically maps a variable with same name
        // return view('ideas.show',compact('idea'));

        return view('ideas.show',[
            'idea'=>$idea
        ]);
    }

    public function store(){
        // dump($_POST); the vanilla php way
        // $idea=new Idea([
        //     'content'=> request()->get('idea', ''),
        // ]);
        // $idea->save();

        request()->validate([ // required has premade validation rules from Laravel
            'idea'=> 'required|min:5|max:240',
        ]);

        $idea= Idea::create([
            'content'=> request()->get('idea', ''),// getting the current idea content from user
        ]);

        //on the redirect object we put a route
        //FLASH MESSAGES - with temporary session that is deleted after shown to the user
        return redirect()->route('dashboard')->with('success','Idea created successfully!');

    }

    public function destroy(Idea $idea){
        // ->first() returns null if no such object found but solution is ->firstOrFail

        // 1.
        // $idea=Idea::where('id',$id)->firstOrFail();//last one returns 404 if no such idea
        // $idea->delete();

        //2. Specify in the brackets the Model (Idea) so laravel binds idea object to $idea
        $idea->delete();

        return redirect()->route('dashboard')->with('success','Idea deleted.');

    }

}
