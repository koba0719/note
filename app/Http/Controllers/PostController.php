<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Like;
use App\Post;
use App\PostTag;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $scope = $request->input('scope');

        $tag = Tag::latest()->get();
        $users = DB::select('
            select u.name, b.count 
            from (
                select p.user_id, count(p.user_id) as count 
                from posts p 
                group by p.user_id 
                order by count desc
                ) as b, 
            note.users as u 
            where u.id = b.user_id 
            order by b.count desc 
            ');
        if ($scope === 'like') {
            $posts = Post::latest()->orderBy('likes_count', 'desc')->get();
        } else {
            $posts = Post::latest()->get();
        }


        return view(
            'posts.index',
            ['posts' => $posts, 'tags' => $tag, 'users' => $users]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $title = $request->get('title');
        $content = $request->get('content');

        $post = new Post();
        $post->title = $title;
        $post->content = $content;
        $post->user_id = Auth::user()->id;
        $post->save();
        return redirect('/');
    }

    /**
     * コメントの投稿
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function commentStore(Request $request, int $id)
    {
        $content = $request->get('content');

        $comment = new Comment();
        $comment->post_id = $id;
        $comment->user_id = Auth::user()->id;
        $comment->comment = $content;

        $comment->save();
        return redirect('/posts/item/' . $id);
    }

    /**
     * Display the specified resource.
     *
     * @param int id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $post = Post::find($id);
        $comments = Comment::where('post_id', [$post->id])->get();
        if (Auth::user() !== null) {
            $like = Like::where('post_id', '=', $id)->where('user_id', '=', Auth::user()->id)->get();
            if ($like->isNotEmpty()) {
                $likeStatus = "1";
            } else {
                $likeStatus = "0";
            }
            return view('posts.show', ['post' => $post, 'comments' => $comments, 'likeStatus' => $likeStatus]);
        }

        return view('posts.show', ['post' => $post, 'comments' => $comments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $post = Post::find($id);
        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $title = $request->get('title');
        $content = $request->get('content');

        $post = Post::find($id);
        $post->title = $title;
        $post->content = $content;

        $post->save();
        return redirect('/posts/item/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        // 投稿削除
        Post::destroy($id);
        //コメント削除
        $comment = Comment::where('post_id', '=', $id);
        if (!empty($comment)) $comment->delete();
        // タグ情報削除
        $postTag = PostTag::where('post_id', '=', $id);
        if (!empty($postTag)) $postTag->delete();
        // いいね削除
        $like = Like::where('post_id', '=', $id);
        if (!empty($like)) $like->delete();

        return redirect('/');
    }

    /**
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request)
    {
        $keyword = $request->get('keyword');
        $posts = Post::Where('title', 'like', '%' . $keyword . '%')->orWhere('content', 'like', '%' . $keyword . '%')->get();
        return view('posts.search', ['keyword' => $keyword, 'posts' => $posts]);
    }
}
