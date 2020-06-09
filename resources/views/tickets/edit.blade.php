@extends('layout')

@section('links')
<link rel="stylesheet" href="{{ asset('css/general.css') }}">
<link rel="stylesheet" href="{{ asset('css/tickets.css') }}">  
@endsection

@section('content')
   <form method="POST" action="/tickets/{{ $ticket->id }}" autocomplete="off" id="ticket-form">
      @csrf
      @method('PUT')
   
      <div>FIRST NAME : </div><input type="text" name="first_name" class="input"  value="{{ $ticket->first_name }}"><br>
      @error('first_name')
          <p class="error-message">*First name required!</p>
      @enderror
      <div>LAST NAME : </div><input type="text" name="last_name" class="input"  value="{{ $ticket->last_name }}"><br>
      @error('last_name')
          <p class="error-message">*Last name required!</p>
      @enderror
      <div>CONTACT NUMBER : </div><input type="text" name="contactNum" class="input"  value="{{ $ticket->contactNum }}"><br>
      @error('contactNum')
          <p class="error-message">*Invalid contact number</p>
      @enderror
      <div>EMAIL : </div><input type="email" name="email" class="input"  value="{{ $ticket->email }}"><br>
      @error('email')
          <p class="error-message">*Invalid email address</p>
      @enderror
      <div>DESCRIPTION : </div><textarea name="description" class="input-box">{{ $ticket->description }}</textarea><br>
      @error('description')
          <p class="error-message">*Invalid description</p>
      @enderror

      <input type="submit" value="Submit" class="submit-button">
   </form>
@endsection