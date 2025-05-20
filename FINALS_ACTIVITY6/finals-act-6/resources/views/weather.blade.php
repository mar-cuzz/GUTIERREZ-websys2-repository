<!DOCTYPE html>
<html>

<head>
    <title>Weather Report</title>
    <style>
        .container {
            display: flex;
            justify-content: space-around;
            margin-top: 50px;
        }

        .card {
            width: 30%;
            padding: 20px;
            background-color: #f2f2f2;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h2 {
            margin-bottom: 10px;
        }

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
    <h1 style="text-align: center;">Weather Report</h1>
    <div class="container">
        @foreach ($row as $weather)
            <div class="card">
                <h2>{{ $weather['city'] }}</h2>
                @if (isset($weather['error']))
                    <p>{{ $weather['error'] }}</p>
                @else
                    <p><strong>Temperature:</strong> {{ $weather['temperature'] }} °C</p>
                    <p><strong>Description:</strong> {{ $weather['description'] }}</p>
                    <p><strong>Humidity:</strong> {{ $weather['humidity'] }}%</p>
                @endif
            </div>
        @endforeach
    </div>
</body>

</html>