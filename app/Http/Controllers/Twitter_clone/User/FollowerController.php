<?php

namespace App\Http\Controllers\Twitter_clone\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FollowerController extends Controller
{
    public function follow($user_id)
    {
        $follower = auth()->user(); // current user id;
        $user = User::findOrFail($user_id);
        $follower->following()->attach($user);

        return redirect()->route('users.index', $user->id)->with('success', 'Followed');
    }

    public function nofollow($user_id)
    {
        $follower = auth()->user(); // current user id;
        $user = User::findOrFail($user_id);
        $follower->following()->detach($user);

        return redirect()->route('users.index', $user->id)->with('info', 'Un followed');
    }


}
