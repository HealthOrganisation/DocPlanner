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

.filter-bar ul li:hover, .filter-bar ul li.active {
    background-color: #3579c3;
    color: #fff;
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
        <ul>
            <li class="active">All</li>
            <li>Technology</li>
            <li>Health</li>
            <li>Travel</li>
            <li>Business</li>
            <li>Entertainment</li>
            <!-- Add more categories as needed -->
        </ul>
    </div>
    <div class="container">
        <!-- Main Article Section -->
        <div class="main-article-section">
            <div class="main-article">
                <img src="images/5.jpg" alt="Main Article">
                <div class="content">
                    <h2>Big Article Title</h2>
                    <p>Summary or excerpt of the big article...</p>
                </div>
            </div>
            <div class="side-articles">
                <div class="side-article">
                    <img src="images/5.jpg" alt="Side Article 1">
                    <div class="content">
                        <h3>Small Article Title 1</h3>
                        <p>Summary of the small article...</p>
                    </div>
                </div>
                <div class="side-article">
                    <img src="images/5.jpg" alt="Side Article 2">
                    <div class="content">
                        <h3>Small Article Title 2</h3>
                        <p>Summary of the small article...</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Small Articles Section -->
        <div class="small-articles-section">
            <div class="small-article">
                <img src="images/5.jpg" alt="Small Article 1">
                <div class="content">
                    <h4>Small Article Title 3</h4>
                    <p>Summary of the small article...</p>
                </div>
            </div>
            <div class="small-article">
                <img src="images/5.jpg" alt="Small Article 2">
                <div class="content">
                    <h4>Small Article Title 4</h4>
                    <p>Summary of the small article...</p>
                </div>
            </div>
            <div class="small-article">
                <img src="images/5.jpg" alt="Small Article 3">
                <div class="content">
                    <h4>Small Article Title 5</h4>
                    <p>Summary of the small article...</p>
                </div>
            </div>
            <div class="small-article">
                <img src="images/5.jpg" alt="Small Article 2">
                <div class="content">
                    <h4>Small Article Title 4</h4>
                    <p>Summary of the small article...</p>
                </div>
            </div>
            <div class="small-article">
                <img src="images/5.jpg" alt="Small Article 3">
                <div class="content">
                    <h4>Small Article Title 5</h4>
                    <p>Summary of the small article...</p>
                </div>
            </div>
            <div class="small-article">
                <img src="images/5.jpg" alt="Small Article 2">
                <div class="content">
                    <h4>Small Article Title 4</h4>
                    <p>Summary of the small article...</p>
                </div>
            </div>
            <div class="small-article">
                <img src="images/5.jpg" alt="Small Article 3">
                <div class="content">
                    <h4>Small Article Title 5</h4>
                    <p>Summary of the small article...</p>
                </div>
            </div>
            <div class="small-article">
                <img src="images/5.jpg" alt="Small Article 2">
                <div class="content">
                    <h4>Small Article Title 4</h4>
                    <p>Summary of the small article...</p>
                </div>
            </div>
            <div class="small-article">
                <img src="images/5.jpg" alt="Small Article 3">
                <div class="content">
                    <h4>Small Article Title 5</h4>
                    <p>Summary of the small article...</p>
                </div>
            </div>
            <div class="small-article">
                <img src="images/5.jpg" alt="Small Article 2">
                <div class="content">
                    <h4>Small Article Title 4</h4>
                    <p>Summary of the small article...</p>
                </div>
            </div>
            <div class="small-article">
                <img src="images/5.jpg" alt="Small Article 3">
                <div class="content">
                    <h4>Small Article Title 5</h4>
                    <p>Summary of the small article...</p>
                </div>
            </div>
            <!-- Add more small articles as needed -->
        </div>
    </div>

    <footer>
        @include('footer')
    </footer>
</body>
</html>
