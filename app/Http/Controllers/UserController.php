<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        return view('users.edit', ['user' => $user]);
    }

    function update(Request $request, int $id)
    {
        $name = $request->get('name');
        $email = $request->get('email');
        $password = $request->get('password');

        $user = User::find($id);
        $user->name = $name;
        $user->email = $email;
        $user->password = Hash::make($password);
        $user->save();

        return redirect('/user/'.$id);
    }
}
