@extends('layout')

@section('links')
   <link rel="stylesheet" href="{{ asset('css/users.css') }}"> 
   <link rel="stylesheet" href="{{ asset('css/general.css') }}"> 
@endsection

@section('content')
   <h1>BEGIN CREATING A NEW USER HERE!</h1>
   <form method="POST" action="/users" autocomplete="off" id="user-form">
    @csrf
    <div>FIRST NAME :</div> <input type="text" name="first_name" class="input" value="{{ old('first_name') }}"><br>
    @error('first_name')
        <p class="error-message">*First name required!</p>
    @enderror
    <div>LAST NAME :</div> <input type="text" name="last_name" class="input" value="{{ old('last_name') }}">
    @error('last_name')
        <p class="error-message">*Last name required!</p>
    @enderror
    <div>EMAIL :</div> <input type="email" name="email" class="input" value="{{ old('email') }}">
    @error('email')
        <p class="error-message">*Invalid email address</p>
    @enderror
    <div>PASSWORD :</div> <input type="password" name="password" class="input">
    @error('password')
    <p class="error-message">*Invalid password: must have 8-50 characters</p>
    @enderror
    <div>CONFIRM PASSWORD :</div> <input type="password" name="passwordConfirm" class="input"><br>
    @error('password' || 'passwordConfirm')
        <p class="error-message">*Different confirm password</p>
    @enderror
    <span>ADMIN: </span> 
    <input type="radio" name="admin" value="1" style="margin-left: 30px; margin-top: 30px"><label for="admin">Yes</label>
    <input type="radio" name="admin" value="0" checked style="margin-left: 30px"><label for="admin">No</label><br>
    <input type="submit" value="Submit" class="submit-button" style="margin-top: 30px">
   </form>
@endsection