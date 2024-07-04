<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    public function show(User $user)
    {
        $ideas = $user->ideas()->paginate(4);
        return view('users.show', compact('user', 'ideas'));
    }


    public function edit(User $user)
    {
        if (auth()->id() !== $user->id) {
            abort(403);
        }
        $ideas = $user->ideas()->paginate(4);
        $editing = true;
        return view('users.show', compact('user', 'editing', 'ideas'));
    }


    public function update(User $user)
    {
        if (auth()->id() !== $user->id) {
            abort(403);
        }
        $validated = request()->validate([
            'name' => 'required|min:3|max:40',
            'bio' => 'nullable|min:1|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        // we show were the image will be saved and then we put the path to it in the database
        if (request()->hasFile('image')) {
            $imagePath = request()->file('image')->store('profile', 'public');
            $validated['image'] = $imagePath;
            // to delete the previous image
            if ($user->image) {
                Storage::disk('public')->delete($user->image);
            }
        }

        $user->update($validated);

        return redirect()->route('users.show', $user->id)->with('success', 'User updated successfully!');
    }

}
