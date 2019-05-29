@extends('layouts.app')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/posts.css') }}">
@endsection

@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            並べ替え
                        </h5>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/?scope=latest">投稿日時</a>
                        <a class="dropdown-item" href="/?scope=like">いいね</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
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
                                    <small class="text-muted">by {{ $post->user->name }} {{ $post->updated_at }}</small>
                                </p>
                            </div>
                        </div>
                    </a>
                @endforeach
                {{ $posts->links() }}
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            新着のタグ
                        </h5>
                        <div class="dropdown-divider"></div>
                        @foreach($tags as $tag)
                            <a class="dropdown-item" href="#">{{ $tag->name }}</a>
                        @endforeach
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-body">
                        <h5 class="card-title">
                            ユーザーランキング
                        </h5>
                        <div class="dropdown-divider"></div>
                        @foreach($users as $user)
                            <a class="dropdown-item" href="{{ url('/user/'.$user->id) }}">{{ $user->name }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
