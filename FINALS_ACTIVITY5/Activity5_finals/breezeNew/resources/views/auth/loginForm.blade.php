
@if(session('error'))
    <p style="color:red">{{ session('error') }}</p>
@endif

<form method="POST" action="{{ route('logins') }}">
    @csrf
    <label>Email:</label>
    <input type="text" name="email"><br>
    <label>Password:</label>
    <input type="password" name="password"><br>
    <button type="submit">Login</button>
</form>

<form method="POST" action="{{ route('addtest') }}">
    @csrf
    <button type="submit">add test user</button>
</form>
email: test@example.com<br>
pw: password123
