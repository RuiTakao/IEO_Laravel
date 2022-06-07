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
                        {{-- <li class="header_nav_list"><a class="header_nav_list_link" href="{{ route('ideas.create') }}">投稿する</a></li> --}}
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <main>
        <div class="container">
            <form method="post" action="{{ route('ideas.store') }}" class="form">
                @csrf
                @error('title')
                <p>{{ $message }}</p>
                @enderror
                <div  class="form_title_input">
                    <input type="text" name="title" placeholder="タイトル" value="{{ old('title') }}">
                </div>
                @error('body')
                <p>{{ $message }}</p>
                @enderror
                <div class="form_contents_input">
                    <textarea name="body" placeholder="アイデアを書きましょう" value="{{ old('body') }}"></textarea>
                </div>
                <div class="form_submit">
                    <button>投稿する</button>
                </div>
            </form>
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
