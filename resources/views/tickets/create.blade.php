@extends('layout')

@section('links')
   <link rel="stylesheet" href="{{ asset('css/tickets.css') }}">  
@endsection

@section('content')
   <h1>BEGIN CREATING A NEW TICKET HERE!</h1>
   <form method="POST" action="/tickets" autocomplete="off" class="ticket-form">
      @csrf
      FIRST NAME : <br><input type="text" name="first_name" class="input" value="{{ old('first_name') }}"><br>
      @error('first_name')
          <p class="error-message">*First name required!</p>
      @enderror
      LAST NAME : <br><input type="text" name="last_name" class="input" value="{{ old('last_name') }}"><br>
      @error('last_name')
          <p class="error-message">*First name required!</p>
      @enderror
      CONTACT NUMBER : <br><input type="text" name="contactNum" class="input" value="{{ old('contactNum') }}"><br>
      @error('contactNum')
          <p class="error-message">*Invalid contact number</p>
      @enderror
      EMAIL : <br><input type="email" name="email" class="input" value="{{ old('email') }}"><br>
      @error('email')
          <p class="error-message">*Invalid email address</p>
      @enderror
      DESCRIPTION : <br><textarea name="description" class="input-box" value="{{ old('description') }}"></textarea><br>
      @error('description')
          <p class="error-message">*Invalid description</p>
      @enderror
      <input type="submit" value="Submit" class="submit-button">
   </form>
@endsection