<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Note</title>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter:400;700">
</head>
<body id="index">
<header>
    <h1 class="header-title">Note</h1>
    <ul class="global-nav">
        <li><a href="{{ url('/login') }}" class="nav-content">Login</a></li>
        <li><a href="{{ url('/contact') }}" class="nav-content">Contact</a></li>
    </ul>
</header>
<main>
    <h1 class="content-title">Write Anything!!</h1>
    <p class="content-body">Noteへようこそ！<br>
        勉強したことをもっと気軽にアウトプットしましょう！
    </p>
    <a href="{{ url('/posts') }}" class="btn btn-success">記事一覧へ!!</a>
</main>
<footer>
    <small>2019 Yusuke-Studio.</small>
</footer>
</body>
</html>
