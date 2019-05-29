<?php

namespace App\Http\Controllers;

use App\Comment;
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
        $posts = Post::where('user_id', '=', $id)->orderBy('created_at', 'desc')->get();
        $comments = Comment::where('user_id', '=', $id)->orderBy('created_at', 'desc')->get();

        return view('users.show',['user' => $user, 'posts' => $posts, 'comments' => $comments]);
    }
}
