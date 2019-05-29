<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{


    /**
     * UserController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['show']);
    }

//    function index()
//    {
//        return view()
//    }


    function show(int $id)
    {
        $user = User::find($id);
        $posts = Post::where('user_id', '=', $id)->orderBy('created_at', 'desc')->get();
        $comments = Comment::where('user_id', '=', $id)->orderBy('created_at', 'desc')->get();

        return view('users.show', ['user' => $user, 'posts' => $posts, 'comments' => $comments]);
    }


    function edit(int $id)
    {
        $user = User::find($id);
        return view('users.edit', ['user', $user]);
    }
}
