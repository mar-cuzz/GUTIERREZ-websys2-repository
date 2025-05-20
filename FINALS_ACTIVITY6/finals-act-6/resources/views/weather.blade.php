<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Weather Report</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(to right, #c9d6ff, #e2e2e2);
            color: #333;
        }

        header {
            background: #1e3c72;
            background: linear-gradient(to right, #2a5298, #1e3c72);
            padding: 30px 0;
            text-align: center;
            color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        header h1 {
            margin: 0;
            font-size: 42px;
            letter-spacing: 1px;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 30px;
            padding: 40px 20px;
            max-width: 1400px;
            margin: auto;
        }

        .card {
            background-color: #fff;
            width: 320px;
            padding: 25px;
            border-radius: 16px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.12);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            text-align: center;
        }

        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.18);
        }

        .card h2 {
            font-size: 24px;
            margin-bottom: 15px;
            color: #2c3e50;
        }

        .card p {
            font-size: 17px;
            margin: 8px 0;
            color: #555;
        }

        .card p strong {
            color: #000;
        }

        .error {
            color: #e74c3c;
            font-weight: bold;
        }

        @media (max-width: 768px) {
            .card {
                width: 90%;
            }

            header h1 {
                font-size: 32px;
            }
        }
    </style>
</head>

<body>
    <header>
        <h1>Weather Report</h1>
    </header>

    <div class="container">
        @foreach ($row as $weather)
            <div class="card">
                <h2>{{ $weather['city'] }}</h2>
                @if (isset($weather['error']))
                    <p class="error">Error: {{ $weather['error'] }}</p>
                @else
                    <p><strong>Temperature:</strong> {{ $weather['temperature'] }} °C</p>
                    <p><strong>Description:</strong> {{ ucfirst($weather['description']) }}</p>
                    <p><strong>Humidity:</strong> {{ $weather['humidity'] }}%</p>
                @endif
            </div>
        @endforeach
    </div>
</body>

</html>