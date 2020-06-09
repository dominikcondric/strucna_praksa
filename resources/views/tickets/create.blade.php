@extends('layout')

@section('links')
   <link rel="stylesheet" href="{{ asset('css/tickets.css') }}"> 
   <link rel="stylesheet" href="{{ asset('css/general.css') }}"> 
@endsection

@section('content')
   <h1>BEGIN CREATING A NEW TICKET HERE!</h1>
   <form method="POST" action="/tickets" autocomplete="off" id="ticket-form">
      @csrf
      <div>FIRST NAME :</div> <input type="text" name="first_name" class="input" value="{{ old('first_name') }}"><br>
      @error('first_name')
          <p class="error-message">*First name required!</p>
      @enderror
      <div>LAST NAME :</div> <input type="text" name="last_name" class="input" value="{{ old('last_name') }}">
      @error('last_name')
          <p class="error-message">*Last name required!</p>
      @enderror
       <div>CONTACT NUMBER :</div> <input type="text" name="contactNum" class="input" value="{{ old('contactNum') }}">
      @error('contactNum')
          <p class="error-message">*Invalid contact number</p>
      @enderror
       <div>EMAIL :</div> <input type="email" name="email" class="input" value="{{ old('email') }}">
      @error('email')
          <p class="error-message">*Invalid email address</p>
      @enderror
       <div>DESCRIPTION :</div> <textarea name="description" class="input-box">{{ old('description') }}</textarea>
      @error('description')
          <p class="error-message">*Invalid description</p>
      @enderror
       <div>ESTIMATED NUMBER OF USERS REQUIRED :</div> <input type="number" name="users" class="input" value="{{ old('users') }}">
      @error('users')
          <p class="error-message">*Invalid input for users</p>
      @enderror
      <input type="submit" value="Submit" class="submit-button" style="margin-top: 15px">
   </form>
@endsection