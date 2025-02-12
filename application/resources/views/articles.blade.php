<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Raleway', sans-serif;
            /* margin: 1cm; */
            margin-top: 2cm;
            padding: 0;
            box-sizing: border-box;
            background: #f9f9f9;
            color: #333;
        }

        header {
            height: 80px; /* Adjust height as needed */
            background-color: #3579c3; /* Header background color */
            margin-bottom: 20px;
        }

        .filter-bar {
    padding: 10px 20px;
    margin-bottom: 20px;
    text-align: center; /* Center the filter items */
}

.filter-bar ul {
    list-style: none;
    display: inline-flex; /* Make the filter items inline and centered */
    gap: 20px;
    margin: 0;
    padding: 0;
}

.filter-bar ul li {
    cursor: pointer;
    padding: 10px 15px;
    border-radius: 5px;
    background-color: #f1f1f1;
    transition: background-color 0.3s;
}

.filter-bar ul li:hover {
    background-color: #ddd; /* Grey on hover */
}

.filter-bar ul li.active {
    background-color: #3579c3; /* Blue for active item */
    color: white;
}



        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .main-article-section {
            display: flex;
            gap: 20px;
            margin-bottom: 40px;
        }

        .main-article, .side-article, .small-article {
            position: relative;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            background: #fff;
        }

        .main-article img, .side-article img, .small-article img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .main-article {
            flex: 2;
            height: 300px; /* Adjust height as needed */
        }

        .side-articles {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .side-article {
            height: 140px; /* Adjust height as needed */
        }

        .content {
            position: absolute;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            color: #fff;
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            text-align: center;
        }

        .small-articles-section {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }

        .small-article {
            height: 200px; /* Square articles */
        }
    </style>
</head>
<body>
    <header>
        @include('header')
    </header>
    <div class="filter-bar">
        <ul id="filter-categories">
            <li class="{{ request('category') == 'all' ? 'active' : '' }}" data-category="all">All</li>
            <li class="{{ request('category') == 'Surgery' ? 'active' : '' }}" data-category="Surgery">Surgery</li>
            <li class="{{ request('category') == 'Technology' ? 'active' : '' }}" data-category="Technology">Technology</li>
            <li class="{{ request('category') == 'Neurology' ? 'active' : '' }}" data-category="Neurology">Neurology</li>
            <li class="{{ request('category') == 'Pharmaceuticals' ? 'active' : '' }}" data-category="Pharmaceuticals">Pharmaceuticals</li>
            <li class="{{ request('category') == 'Cancer' ? 'active' : '' }}" data-category="Cancer">Cancer</li>
        </ul>
        
    </div>
    <div class="container">
        <!-- Main Article Section -->
        @if ($articles->count() > 0)
        <div class="main-article-section">
            <div class="main-article" data-category="{{ $articles->first()->category }}">
                <a href="{{ route('show', $articles->first()->id) }}">
                    <img src="{{ asset('images/' . $articles->first()->image) }}" alt="Main Article">
                </a>
                <div class="content">
                    <h2><a href="{{ route('show', $articles->first()->id) }}" style="color: white; text-decoration: none;">{{ $articles->first()->title }}</a></h2>
                    <p>{{ Str::limit($articles->first()->content, 100) }}</p>
                </div>
            </div>
            <div class="side-articles">
                @foreach ($articles->skip(1)->take(2) as $article)
                <div class="side-article" data-category="{{ $article->category }}">
                    <a href="{{ route('show', $article->id) }}">
                        <img src="{{ asset('images/' . $article->image) }}" alt="Side Article">
                    </a>
                    <div class="content">
                        <h3><a href="{{ route('show', $article->id) }}" style="color: white; text-decoration: none;">{{ $article->title }}</a></h3>
                        <p>{{ Str::limit($article->content, 80) }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    
        <!-- Small Articles Section -->
        <div class="small-articles-section">
            @foreach ($articles->skip(3) as $article)
            <div class="small-article" data-category="{{ $article->category }}">
                <a href="{{ route('show', $article->id) }}">
                    <img src="{{ asset('images/' . $article->image) }}" alt="Small Article">
                </a>
                <div class="content">
                    <h4><a href="{{ route('show', $article->id) }}" style="color: white; text-decoration: none;">{{ $article->title }}</a></h4>
                    <p>{{ Str::limit($article->content, 50) }}</p>
                </div>
            </div>
            @endforeach
        </div>        
        @else
        <p>No articles found.</p>
        @endif
    </div>
    

    <footer>
        @include('footer')
    </footer>
    <script>
    document.querySelectorAll('.filter-bar ul li').forEach(function(item) {
    // Check if the current filter matches the selected category in the URL
    let category = item.getAttribute('data-category');
    if (window.location.search.includes('category=' + category)) {
        item.classList.add('active'); // Add active class if category matches
    }

    item.addEventListener('click', function() {
        // Remove 'active' class from all items
        document.querySelectorAll('.filter-bar ul li').forEach(function(li) {
            li.classList.remove('active');
        });

        // Add active class to the clicked filter item
        this.classList.add('active');

        // Redirect to filtered articles
        window.location.href = '/articles?category=' + category;
    });
});

    </script>
</body>
</html>