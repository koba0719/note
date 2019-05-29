<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function index()
    {
//        return view()
    }

    function show(int $id)
    {
        $user = User::find($id);
        $posts = Post::find($user->id);

        return view('users.show',['user' => $user, 'posts' => $posts]);
    }
}
