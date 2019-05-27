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
                <form action="{{ url('/posts/store') }}" id="post-form" method="POST">
{{--                <form id="post-form">--}}
                    @csrf
                    @method('POST')
                    <h3>投稿</h3>
                    <input type="text" name="title" class="form-control" placeholder="タイトル">
                    <div class="mt-3"></div>
                    <div class="card">
                        <div id="editor" class="editor-card">
                        </div>
                        <input type="hidden" id="hideContent" name="content">
                    </div>
                    <button type="submit" id="submit" class="btn btn-primary">noteへ投稿</button>
                </form>
                <!-- Include the Quill library -->
                <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

                <!-- Initialize Quill editor -->
                <script>
                    var quill = new Quill('#editor', {
                        placeholder: '本文\nリッチテキストが使用できます',
                        theme: 'snow'
                    });

                    var form = document.getElementById('post-form');
                    form.onsubmit = function() {
                        var about = document.querySelector('input[name=content]');
                        about.value = quill.root.innerHTML;
                    }
                </script>
            </div>
        </div>
    </div>
@endsection
