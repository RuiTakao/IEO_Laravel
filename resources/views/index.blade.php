<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <title>Idea Expo Online</title>
</head>
<body>
    <header>
        <div class="header container">
            <div class="header-left">
                <h1 class="header-logo logo">IEO</h1>
            </div>
            <div class="header-right">
                <nav class="header_nav">
                    <ul class="header_nav_lists">

                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">ユーザー登録</a>
                        </li>
                        @endguest

                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">ログイン</a>
                        </li>
                        @endguest

                        @auth
                        <li class="header_nav_list">
                            <a class="header_nav_list_link" href="{{ route('ideas.create') }}">投稿する</a>
                        </li>
                        @endauth

                        @auth
                        <button form="logout-button" class="dropdown-item" type="submit">
                            ログアウト
                        </button>
                        <form id="logout-button" method="POST" action="{{ route('logout') }}">
                            @csrf
                        </form>
                        @endauth

                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <main>
        <div class="container">
            <ul class="main_content_lists">
                @foreach ($ideas as $idea)
                <li class="main_content_list">
                    <div class="main_content_list_head">
                        <a class="main_content_name" href="#">{{ $idea->user->name }}</a>
                        <p class="main_content_create_time">{{ $idea->created_at->format('Y.m.d') }}</p>
                    </div>
                    <div class="main_content_list_body">
                        <h3 class="main_content_title">
                            <a href="{{ route('ideas.show', $idea) }}">
                            {{ $idea->title }}
                            </a>
                        </h3>
                    </div>
                    <div class="main_content_list_foot">
                        <a href="#" class="main_content_like">いいね 50</a>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </main>
    <footer>
        <div class="footer container">
            <div class="footer-left">
                <h1 class="footer-logo logo">IEO</h1>
            </div>
            <div class="footer-right"></div>
        </div>
    </footer>
</body>
</html>
