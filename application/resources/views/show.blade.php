<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $article->title }}</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Raleway', sans-serif;
            margin: 0;
            padding: 0;
            background: #f9f9f9;
            color: #333;
        }

        .container {
            width: 90%;
            max-width: 900px;
            margin: 40px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #3579c3;
        }

        .article-image {
            width: 100%;
            height: 400px;
            object-fit: cover;
            border-radius: 8px;
        }

        .article-content {
            margin-top: 20px;
            line-height: 1.6;
        }

        .article-meta {
            font-size: 14px;
            color: #555;
            margin-top: 10px;
            text-align: center;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
            color: #3579c3;
        }
    </style>
</head>
<header>
    @include('header')
</header>
<body>
    <div class="container">
        <img class="article-image" src="{{ asset('images/' . $article->image) }}" alt="Article Image">
        <p class="article-meta">Posted on {{ $article->date_posted }}</p>
        <h1>{{ $article->title }}</h1>
        <div class="article-content">
            <p>{{ $article->content }}</p>
        </div>
        <a href="/articles" class="back-link">← Back to Articles</a>
    </div>
</body>
<footer>
    @include('footer')
</footer>
</html>
