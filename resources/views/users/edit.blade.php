@extends('layout')

@section('links')
   <link rel="stylesheet" href="{{ asset('css/users.css') }}"> 
   <link rel="stylesheet" href="{{ asset('css/general.css') }}"> 
@endsection

@section('content')
   <h1>EDIT THE EXISTING USER HERE!</h1>
   <form method="POST" action="/users/{{ $user->id }}" autocomplete="off" id="user-form">
    @csrf
    @method('PUT')
    <div>FIRST NAME :</div> <input type="text" name="first_name" class="input" value="{{ $user->first_name }}"><br>
    @error('first_name')
        <p class="error-message">*First name required!</p>
    @enderror
    <div>LAST NAME :</div> <input type="text" name="last_name" class="input" value="{{ $user->last_name }}">
    @error('last_name')
        <p class="error-message">*Last name required!</p>
    @enderror
    <div>EMAIL :</div> <input type="email" name="email" class="input" value="{{ $user->email }}">
    @error('email')
        <p class="error-message">*Invalid email address</p>
    @enderror
    <div>CHANGE PASSWORD :</div> <input type="password" name="password" class="input">
    @error('password')
    <p class="error-message">*Invalid password: must have 8-50 characters</p>
    @enderror
    <div>CONFIRM YOUR PASSWORD :</div> <input type="password" name="passwordConfirm" class="input">
    @error('passwordConfirm')
        <p class="error-message">*Different confirm password</p>
    @enderror
    <input type="submit" value="Submit" class="submit-button" style="margin-top: 15px">
   </form>
@endsection