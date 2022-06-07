<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
        <title>Idea Expo Online</title>
</head>
<body>
    <header>
        <div class="header container">
            <div class="header-left">
                <h1 class="header-logo logo"><a href="{{ route('ideas.index') }}">IEO</a></h1>
            </div>
            <div class="header-right">
                <nav class="header_nav">
                    <ul class="header_nav_lists">
                        <li class="header_nav_list">
                            <a class="header_nav_list_link" href="{{ route('ideas.create') }}">投稿する</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <main>
        <div class="container">
            <div class="idea_content_area">
                <div class="idea_content_head">
                    <a href="#" class="idea_content_name">{{ $idea->user->name }}</a>
                    <span class="idea_content_create_time">{{ $idea->created_at }}</span>
                </div>
                <div class="idea_content_body">
                    <h3 class="idea_content_body_title">{{ $idea->title }}</h3>
                    <div class="idea_content_body_text">{{ $idea->body }}</div>
                </div>
                <div class="idea_content_foot">
                    <a href="#" class="idea_content_like">いいね 50</a>
                </div>
            </div>
            <div class="idea_comment_area">
                <div class="idea_comment_head">
                    <h3 class="idea_comment_title">コメント</h3>
                </div>
                <ul class="idea_comment_body_lists">
                    @foreach ($idea->comments()->latest()->get() as $comment)
                    <li class="idea_comment_body_list">
                        <div class="idea_comment_body_head">
                            <a href="#" class="idea_comment_name">{{ $idea->user->name }}</a>
                            <span class="idea_comment_create_time">{{ $comment->created_at }}</span>
                        </div>
                        <div class="idea_comment_body_text">
                            {{ $comment->body }}
                        </div>
                        <div class="idea_comment_body_foot">
                            <a href="#" class="idea_comment_like">いいね 50</a>
                        </div>
                    </li>
                    @endforeach
                </ul>
                <div class="idea_comment_foot">
                    <form method="post" class="comment_form" action="{{ route('comments.store', $idea) }}">
                        @csrf
                        <label for="comment">コメント</label>
                        <textarea name="body" id="comment"></textarea>
                        <div class="form_submit">
                            <button>コメント</button>
                        </div>
                    </form>
                </div>
            </div>
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
