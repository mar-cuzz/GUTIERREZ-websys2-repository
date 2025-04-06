<h2>Register Page</h2>
<form action="{{ route('register') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Name"> <br>
    <input type="text" name="email" placeholder="Email"> <br>
    <input type="text" name="password" placeholder="Password"> <br>
    <input type="submit">
</form>