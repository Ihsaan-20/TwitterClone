<?php

namespace App\Http\Controllers\Twitter_clone\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::get();

        foreach ($users as $user) {
            $user->load('following', 'followers');
            $user->followingCount = $user->following->count();
            $user->followersCount = $user->followers->count();
        }

        return view('twitter_clone.user.index', compact('users'));
    }

    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
