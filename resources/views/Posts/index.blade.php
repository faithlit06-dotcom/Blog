<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1 class="text-center" >Welcome to AjoBlog.com</h1>
    <div style="margin-bottom: 15px;">
    <span>Logged in as: <strong>{{ Auth::user()->name }}</strong></span>
    <form method="POST" action="{{ route('logout') }}" style="display: inline; margin-left: 10px;">
        @csrf
        <button type="submit" style="background: #dc2626; color: white; border: none; padding: 4px 8px; border-radius: 4px; cursor: pointer;">
            Logout
        </button>
    </form>
</div>
    <div>
        @if(session()->has('success'))
        <div>
            {{session('success')}}

        </div>
        @endif
    </div>
    <div>
        <div>
            <a href="{{ route('posts.create') }}">Create a Post</a>
        </div>
        <table border = "1">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>Content</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            @foreach($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                 <td>{{ $post->title }}</td>
                <td>{{ $post->author }}</td>
                <td>{{ $post->content }}</td>
                <td><a href="{{ route('posts.edit', ['post' => $post->id]) }}">Edit</a></td>
                <td>
                    <form id="delete-form-{{ $post->id }}" action="{{ route('posts.destroy', ['post' => $post->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Delete"   >
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</body>
</html>