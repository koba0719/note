<?php

namespace App\Http\Controllers;

use App\Like;
use App\Post;
use http\Client\Response;
use Illuminate\Http\Request;

class LikeController extends Controller
{

    /**
     * いいねの登録
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    function like(Request $request)
    {
        $post_id = $request->get('post_id');
        $user_id = $request->get('user_id');

        if ($post_id == null || $user_id == null) {
            return abort(400);
        }

        $like = new Like();
        $like->user_id = $user_id;
        $like->post_id = $post_id;
        $like->save();

        $post = Post::find($post_id);
        $post->likes_count += 1;
        $post->save();
        return response('success', 200);
    }


    /**
     * いいねの解除
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    function unlike(Request $request)
    {
        $post_id = $request->get('post_id');
        $user_id = $request->get('user_id');

        if ($post_id === null || $user_id === null) {
            return abort(400);
        }

        $like = Like::where('user_id', '=', $user_id)->where('post_id', '=', $post_id);
        $like->delete();

        $post = Post::find($post_id);
        if ($post->likes_count > 0) {
            $post->likes_count -= 1;
        }
        $post->save();

        return response('success', 200);
    }
}
