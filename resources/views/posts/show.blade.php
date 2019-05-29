@extends('layouts.app')
@section('head')
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/posts.css') }}">
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-1 like-col mt-4">
                <div class="like-col__inner">
                    <div id="like">
                        {{--                        <like-button></like-button>--}}
                        @auth
                            <like-button like_status={{ $likeStatus }} post_id="{{ $post->id }}"
                                         user_id="{{ Auth::user()->id }}"></like-button>
                        @endauth
                    </div>
                </div>
            </div>
            <div class="col-md-10">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">{{ $post->title }}</h1>

                        <small class="card-title">
                            <span>{{ $post->user->name }} {{ $post->created_at }}</span>
                        </small>
                        @auth
                            @if(Auth::user()->id === $post->user_id)
                                <div class="float-right">
                                    <form action="{{ url('posts/item/'.$post->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ url('posts/item/'.$post->id.'/edit') }}"
                                           class="btn btn-success">編集</a>
                                        <input type="submit" class="btn btn-danger" value="削除">
                                    </form>
                                </div>
                            @endif
                        @endauth
                        <div class="dropdown-divider mt-4"></div>
                        <p class="card-text">{!! $post->content !!}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="mt-5"></div>
                <h3>コメント</h3>
                @foreach($comments as $comment)
                    <div class="card mt-3">
                        <div class="card-body">
                            <small class="card-title">
                                {{ $comment->user->name }}  {{ $comment->created_at }}
                            </small>
                            <div class="dropdown-divider"></div>
                            <p class="card-text">{!! $comment->comment !!}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="row">
            <div class="col-md-1"></div>
            @auth
                <div class="col-md-10">
                    <form action="{{ url('/posts/item/'.$post->id.'/comment/store') }}" id="post-form" method="POST">
                        @csrf
                        @method('POST')
                        <div class="mt-3"></div>
                        <div class="card">
                            <div id="editor">
                            </div>
                            <input type="hidden" id="hideContent" name="content">
                            <input type="hidden" id="plain_text" name="plain_text">
                        </div>
                        <button type="submit" id="submit" class="btn btn-primary">コメントをする</button>
                    </form>
                    <!-- Include the Quill library -->
                    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

                    <!-- Initialize Quill editor -->
                    <script type="application/javascript">
                        let quill = new Quill('#editor', {
                            placeholder: 'コメントを入力してください',
                            theme: 'snow'
                        });

                        let form = document.getElementById('post-form');

                        form.onsubmit = function () {
                            let about = document.querySelector('input[name=content]');
                            let plain_text = document.querySelector('input[name=plain_text]');
                            about.value = quill.root.innerHTML;
                            plain_text.value = document.getElementById('editor').textContent;
                        }
                    </script>
                </div>
            @endauth
        </div>
    </div>
@endsection
