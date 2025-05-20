<!DOCTYPE html>
<html>

<head>
    <title>Top News</title>
    <style>
        .row {
            display: flex;
            justify-content: space-between;
            margin: 40px auto;
            max-width: 1200px;
        }

        .column {
            width: 30%;
            background: #f0f0f0;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
            text-align: left;
        }

        .column img {
            max-width: 100%;
            border-radius: 6px;
        }

        h2 {
            font-size: 18px;
            margin: 10px 0;
        }
    </style>
</head>

<body>

    <h1 style="text-align:center;">Top 3 US News Headlines</h1>

    <div class="row">
        @forelse ($articles as $article)
            <div class="column">
                <img src="{{ $article['urlToImage'] ?? 'https://via.placeholder.com/300x200' }}" alt="News Image">
                <h2>{{ $article['title'] }}</h2>
                <p>{{ $article['description'] ?? 'No description available.' }}</p>
                <a href="{{ $article['url'] }}" target="_blank">Read more</a>
            </div>
        @empty
            <p>No news articles available.</p>
        @endforelse
    </div>

</body>

</html>