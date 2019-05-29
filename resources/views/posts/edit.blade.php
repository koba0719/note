@extends('layouts.app')
@section('head')
    <!-- Include stylesheet -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/posts.css') }}">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-1"></div>

            <div class="col-md-10">
                <!-- Create the editor container -->
                <form action="{{ url('/posts/item/'.$post->id) }}" id="post-form" method="POST">
                    @csrf
                    @method('PUT')
                    <h3>編集</h3>
                    <input type="text" name="title" class="form-control" value="{{ $post->title }}" placeholder="タイトル">
                    <div class="mt-3"></div>
                    <div class="card">
                        <div id="editor" class="editor-card">
                            {!! $post->content !!}
                        </div>
                        <input type="hidden" id="hideContent" name="content">
                    </div>
                    <button type="submit" id="submit" class="btn btn-primary">記事を更新</button>
                </form>
                <!-- Include the Quill library -->
                <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

                <!-- Initialize Quill editor -->
                <script>
                    let quill = new Quill('#editor', {
                        placeholder: '本文\nリッチテキストが使用できます',
                        theme: 'snow'
                    });

                    let form = document.getElementById('post-form');
                    form.onsubmit = function() {
                        let about = document.querySelector('input[name=content]');
                        about.value = quill.root.innerHTML;
                    }
                </script>
            </div>
        </div>
    </div>
@endsection
