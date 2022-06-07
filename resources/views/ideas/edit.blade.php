<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="post" action="{{ route('ideas.update', $idea) }}">
        @method('PATCH')
        @csrf

        @error('title')
        <p>{{ $message }}</p>
        @enderror
        <p>title<input type="text" name="title" value="{{ old('title', $idea->title) }}"></p>
        @error('body')
        <p>{{ $message }}</p>
        @enderror
        <p>contents<input type="text" name="body" value="{{ old('body', $idea->body) }}"></p>
        <p><input type="submit" value="Update Idea"></p>
    </form>
    <p><a href="{{ route('ideas.show', $idea) }}">Back</a></p>
</body>
</html>
