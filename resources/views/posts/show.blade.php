<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $post->title }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
        }
        .post-content {
            line-height: 1.8;
            margin: 30px 0;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-left: 10px;
        }
        .btn-danger {
            background: #dc3545;
        }
        .actions {
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <a href="{{ route('posts.index') }}">← Back to Posts</a>
    <h1>{{ $post->title }}</h1>
    <div class="post-content">
        {!! nl2br(e($post->content)) !!}
    </div>
    <div class="actions">
        <a href="{{ route('posts.edit', $post) }}" class="btn">Edit</a>
        <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
        </form>
    </div>
</body>
</html>