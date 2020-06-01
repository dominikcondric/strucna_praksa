@extends('layout')

@section('links')
   <link rel="stylesheet" href="{{ asset('css/tickets.css') }}">  
@endsection

@section('content')
   <form method="POST" action="/tickets/{{ $ticket->id }}" autocomplete="off" class="ticket-form">
      @csrf
      @method('PUT')
   
      FIRST NAME : <br><input type="text" name="first_name" class="input"  value="{{ $ticket->first_name }}"><br>
      @error('first_name')
          <p class="error-message">*First name required!</p>
      @enderror
      LAST NAME : <br><input type="text" name="last_name" class="input"  value="{{ $ticket->last_name }}"><br>
      @error('last_name')
          <p class="error-message">*First name required!</p>
      @enderror
      CONTACT NUMBER : <br><input type="text" name="contactNum" class="input"  value="{{ $ticket->contactNum }}"><br>
      @error('contactNum')
          <p class="error-message">*Invalid contact number</p>
      @enderror
      EMAIL : <br><input type="email" name="email" class="input"  value="{{ $ticket->email }}"><br>
      @error('email')
          <p class="error-message">*Invalid email address</p>
      @enderror
      DESCRIPTION : <br><textarea name="description" class="input-box">{{ $ticket->description }}</textarea><br>
      @error('description')
          <p class="error-message">*Invalid description</p>
      @enderror

      <input type="submit" value="Submit" class="submit-button">
   </form>
@endsection