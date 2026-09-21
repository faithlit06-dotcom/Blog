<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Edit a Post</h1>

    <div>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif

    </div>
    <form method="POST" action="{{ route('posts.update', ['post' => $post->id]) }}">
    @csrf
    @method('PUT')
        <div>
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" placeholder="Enter post title" required value="{{$post->title}}">
        </div>
       <div>
        <label for="content">Content:</label>
        <textarea name="content" id="content" placeholder="Enter post content" required>{{$post->content}}</textarea>
       </div>
       <div>
        <label for="author">Author:</label>
        <input type="text" name="author" id="author" placeholder="Enter author name" required value="{{$post->author}}">
    </div>
    <div>
            <button type="submit" value="Update Post">Update Post</button>
    </div>
    </form>
</body>
</html>