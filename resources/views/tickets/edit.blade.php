@extends('layout')

@section('links')
   <link rel="stylesheet" href="{{ asset('css/tickets.css') }}">  
@endsection

@section('content')
   <form method="POST" action="/tickets/{{ $ticket->id }}" autocomplete="off" id="ticket-form">
      @csrf
      @method('PUT')
      
      FIRST NAME : <br><input type="text" name="first-name" class="input" value="{{ $ticket->first_name }}"><br>
      LAST NAME : <br><input type="text" name="last-name" class="input" value="{{ $ticket->last_name }}"><br>
      CONTACT NUMBER : <br><input type="text" name="contactnum" class="input" value="{{ $ticket->contactNum }}"><br>
      EMAIL : <br><input type="email" name="email" class="input" value="{{ $ticket->email }}"><br>
      DESCRIPTION : <br><textarea name="description" class="input-box">{{ $ticket->description }}</textarea><br>
      <input type="submit" value="Submit" id="submit-button">
   </form>
@endsection