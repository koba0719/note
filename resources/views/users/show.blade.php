@extends('layouts.app')
@section('head')
    <link rel="stylesheet" href="{{ asset('css/users.css') }}">
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <h3 class="card-title ml-3 mt-2">{{ $user->name }}</h3>
                    <small class="card-title ml-3">{{ $user->email }}</small>
                    @auth
                        @if($user->id === Auth::user()->id)
                            <a href="{{ url('user/'.$user->id.'/edit') }}" class="card-title ml-3">
                                <small>プロフィールを編集する</small>
                            </a>
                        @endif
                    @endauth
                </div>
            </div>

            <div class="col-md-9">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a href="#tab1" class="nav-link active user-nav-link" data-toggle="tab">投稿一覧</a>
                    </li>
                    <li class="nav-item">
                        <a href="#tab2" class="nav-link user-nav-link" data-toggle="tab">コメント一覧</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div id="tab1" class="tab-pane active">
                        @foreach($posts as $post)
                            <a href="{{ url('/posts/item/'.$post->id) }}" class="post-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            {{ $post -> title }}
                                        </h5>
                                        <p class="card-text">
                                            <small class="text-muted">{{ $post->likes_count }}いいね</small>
                                            <br>
                                            <small class="text-muted">
                                                by {{ $post->user->name }} {{ $post->updated_at }}</small>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>

                    <div id="tab2" class="tab-pane">
                        @foreach($comments as $comment)
                            <a href="{{ url('/posts/item/'.$comment->post_id) }}" class="post-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            {{ $comment->plain_text }}
                                        </h5>
                                        <p class="card-text">
                                            <small class="text-muted">{{ $comment->post->title }}</small>
                                            <br>
                                            <small class="text-muted">
                                                by {{ $comment->user->name }} {{ $comment->created_at }}</small>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
