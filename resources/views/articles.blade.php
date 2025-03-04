<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            color: #333;
        }
        .article {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        .article h2 {
            margin-top: 0;
            color: #007bff;
        }
        .article p {
            margin: 5px 0;
        }
        .article .meta {
            font-size: 0.9em;
            color: #666;
        }
    </style>
</head>
<body>
    <h1>Articles</h1>
    @foreach ($articles as $article)
        <div class="article">
            <h2>{{ $article->title }}</h2>
            <p>{{ $article->content }}</p>
            <p class="meta">
                <strong>Author:</strong> {{ $article->author }} | 
                <strong>Category:</strong> {{ $article->category }} | 
                <strong>Published:</strong> {{ $article->published_at->format('M d, Y') }}
            </p>
        </div>
    @endforeach
</body>
</html>