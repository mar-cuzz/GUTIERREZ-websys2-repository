<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Top News</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(to right, #e0eafc, #cfdef3);
            color: #333;
        }

        h1 {
            text-align: center;
            margin: 50px 20px 30px;
            font-size: 40px;
            color: #2c3e50;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 30px;
            padding: 0 20px 60px;
            max-width: 1400px;
            margin: 0 auto;
        }

        .column {
            width: 360px;
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 12px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .column:hover {
            transform: translateY(-6px);
            box-shadow: 0 16px 24px rgba(0, 0, 0, 0.15);
        }

        .column img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .column-content {
            padding: 20px;
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .column h2 {
            font-size: 20px;
            margin: 0 0 10px;
            color: #1a237e;
        }

        .column p {
            flex-grow: 1;
            font-size: 16px;
            color: #555;
            margin: 0 0 15px;
        }

        .column a {
            align-self: flex-start;
            padding: 10px 16px;
            background: #1e88e5;
            color: #fff;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            transition: background 0.3s ease;
        }

        .column a:hover {
            background: #1565c0;
        }

        .empty-message {
            text-align: center;
            font-size: 20px;
            color: #666;
            padding: 50px;
        }

        @media (max-width: 768px) {
            .column {
                width: 90%;
            }

            h1 {
                font-size: 30px;
            }
        }
    </style>
</head>

<body>

    <h1>Top 3 US News Headlines</h1>

    <div class="row">
        @forelse ($articles as $article)
            <div class="column">
                <img src="{{ $article['urlToImage'] ?? 'https://via.placeholder.com/300x200?text=No+Image' }}"
                    alt="News Image">
                <div class="column-content">
                    <h2>{{ $article['title'] }}</h2>
                    <p>{{ $article['description'] ?? 'No description available.' }}</p>
                    <a href="{{ $article['url'] }}" target="_blank">Read more</a>
                </div>
            </div>
        @empty
            <div class="empty-message">No news articles available.</div>
        @endforelse
    </div>

</body>

</html>