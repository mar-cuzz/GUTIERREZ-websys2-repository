<h2>Welcome, {{ $user->name }}</h2>

<form method="POST" action="{{route('lgout')}}">
    @csrf
    <button type="submit">Logout</button>
</form>
