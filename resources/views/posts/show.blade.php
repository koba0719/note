@extends('layouts.app')
@section('head')
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <h1 class="card-title">{{ $post->title }}</h1>
                            </div>
                            <div class="col-md-6"></div>
                            @if(Auth::user()->id === $post->user_id)
                                <div class="col-md-3">
                                    <a href="#">編集</a>
                                    <a href="#">削除</a>
                                </div>
                            @else
                                <div class="col-md-3"></div>
                            @endif
                        </div>
                        <small class="card-title">
                            <span>{{ $post->user->name }} {{ $post->created_at }}</span>
                        </small>
                        <div class="dropdown-divider"></div>
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
                    <div class="card mt-1">
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
            <div class="col-md-10">
                <form action="{{ url('/posts/item/'.$post->id.'/comment/store') }}" id="post-form" method="POST">
                    @csrf
                    @method('POST')
                    <div class="mt-3"></div>
                    <div class="card">
                        <div id="editor" class="editor-card">
                        </div>
                        <input type="hidden" id="hideContent" name="content">
                    </div>
                    <button type="submit" id="submit" class="btn btn-primary">コメントをする</button>
                </form>
                <!-- Include the Quill library -->
                <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

                <!-- Initialize Quill editor -->
                <script>
                    var quill = new Quill('#editor', {
                        placeholder: 'コメントを入力してください',
                        theme: 'snow'
                    });

                    var form = document.getElementById('post-form');
                    form.onsubmit = function () {
                        var about = document.querySelector('input[name=content]');
                        about.value = quill.root.innerHTML;
                    }
                </script>
            </div>
        </div>
    </div>
@endsection
