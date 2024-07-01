<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function show(Idea $idea)
    {
        // $idea is actually int id, but Specifying it with a Model type in front
        // tells laravel go and take the object corresponding to that id from db

        // Laravel automatically maps a variable with same name
        // return view('ideas.show',compact('idea'));

        return view('ideas.show', [
            'idea' => $idea,
        ]);
    }

    public function store()
    {
        // dump($_POST); the vanilla php way
        // $idea=new Idea([
        //     'content'=> request()->get('idea', ''),
        // ]);
        // $idea->save();

        // I believe that this validate method returns to the same template loading errors
        // that are accessible with the @error @enderror directive
        $validated = request()->validate([ // required has premade validation rules from Laravel
            'content' => 'required|min:5|max:240',
        ]);

        // validated is assarr with all the validated values
        Idea::create($validated);// getting the current idea content from user

        //on the redirect object we put a route
        //FLASH MESSAGES - with temporary session that is deleted after shown to the user
        return redirect()->route('dashboard')->with('success', 'Idea created successfully!');

    }

    public function destroy(Idea $idea)
    {
        // ->first() returns null if no such object found but solution is ->firstOrFail

        // 1.
        // $idea=Idea::where('id',$id)->firstOrFail();//last one returns 404 if no such idea
        // $idea->delete();

        //2. Specify in the brackets the Model (Idea) so laravel binds idea object to $idea
        $idea->delete();

        return redirect()->route('dashboard')->with('success', 'Idea deleted.');

    }

    public function edit(Idea $idea)
    {
        $editing = true;
        return view('ideas.show', compact('idea', 'editing'));
    }

    public function update(Idea $idea)
    {
        $validated=request()->validate([
            'content' => 'required|min:5|max:240',
        ]);

//        $idea->content = request()->get('content', '');
//        $idea->save();
        $idea->update($validated);

        return redirect()->route('ideas.show', $idea->id)->with('success', 'Idea updated successfully');
    }

}
