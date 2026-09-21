<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>create a new Post</h1>

    <div>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif

    </div>
    <form method="POST" action="{{ route('posts.store') }}">
    @csrf
        @method('POST')
        <div>
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" placeholder="Enter post title" required>
        </div>
        <br>
        <div>
            <label for="author">Author:</label>
            <input type="text" name="author" id="author" placeholder="Enter author name" required>
        </div>
        <br>
        <div>
            <label for="content">Content:</label>
            <textarea name="content" id="content" placeholder="Enter post content" required></textarea>
        </div>
        <br>
    <div>
            <button style="background: #3b82f6; color: white; border: none; padding: 4px 8px; border-radius: 4px; cursor: pointer;" type="submit">Save Post</button>
    </div>
    </form>
</body>
</html>