<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: #343a40;
            padding-top: 20px;
            position: fixed;
        }

        .sidebar a {
            display: block;
            color: white;
            padding: 15px;
            text-decoration: none;
        }

        .sidebar a:hover {
            background-color: #495057;
        }

        .content {
            margin-left: 260px;
            padding: 20px;
            width: 100%;
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h2 class="text-white text-center">Job Listing</h2>
        <h6 class="text-white text-center">Midterm Requirement</h6>
        <a href="{{route('welcome')}}">Home</a>
        <a href="{{ route('jobs.index')}}">Jobs</a>
        <a href="{{route('candidates.index')}}">Candidates</a>
        <a href="{{ route('logout') }}" class="btn btn-link text-white w-100 text-start">Logout</a>

    </div>

    <!-- Main Content -->
    <div class="content">
        @yield('content')
    </div>

</body>

</html>