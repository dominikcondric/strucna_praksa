@extends('layout')

@section('content')

<div id="login-area">
    <br>
    <h1>Login as User</h1> <br><br>
    <form method="POST" action="/users" autocomplete="off">
        <big>Username: </big> <input type="text" name="username" style="width: 50%; height: 30px; font-size: x-large"><br>
        <big>Password: </big> <input type="password" name="pass" style="width: 50%; height: 30px; font-size: x-large"><br>
    </form>
</div>
@endsection