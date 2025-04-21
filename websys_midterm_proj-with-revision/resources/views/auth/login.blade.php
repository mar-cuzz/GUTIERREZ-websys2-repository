<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5">
    <h2 class="text-center mb-4">Login</h2>
    <div class="card p-4 shadow-sm">
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Email:</label>
                <input type="text" name="username" class="form-control" value="{{ old('username') }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Password:</label>
                <input type="password" name="password" class="form-control" value="{{ old('password') }}" required>
            </div>
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </form>
    </div>
</div>