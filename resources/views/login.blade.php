@extends('layout')

@section('content')

<div id="login-area">
    <br>
    <h1>Login as User</h1> <br>
    <form method="POST" action="/users" autocomplete="off">
        <h2 style=" display: inline">Username: </h2> <input type="text" name="username" style="width: 50%; height: 30px; font-size: x-large"><br>
        <h2 style=" display: inline">Password: </h2> <input type="password" name="pass" style="width: 50%; height: 30px; font-size: x-large"><br>
        <br><br>
        <button type="submit" class="button" style="width: 200px; height: 80px; font-size: 40px">Login</button>
    </form>
</div>
@endsection