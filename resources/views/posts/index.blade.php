<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blogs</title>
    <style>
         body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
        }
        .post {
            border: 1px solid #ddd;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
        .post h2 {
            margin-top: 0;
        }
        .post a {
            color: #007bff;
            text-decoration: none;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <h1>All Posts</h1>
    <a href="{{ route('posts.create') }}" class="btn">Create New Post</a>
    
    @foreach ($posts as $post)
        <div class="post">
            <h2>{{ $post->title }}</h2>
            <p>{{ Str::limit($post->content,150) }}</p>
            <a href="{{ route('posts.show', $post->id) }}">Read More</a>
        </div>
    @endforeach
    {{ $posts->links() }}
</body>
</html>