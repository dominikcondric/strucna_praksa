@extends('layout')

@section('links')
   <link rel="stylesheet" href="{{ asset('css/tickets.css') }}">  
@endsection

@section('content')
<h2>Already submitted a ticket, but you want to edit it? Just enter your name and ticket ID and there you go :)</h2> 
   <form method="POST" action="/tickets/search" class="ticket-form" style="margin-bottom: 50px">
      @csrf
      TICKET-ID :    <input type="number" name="ticketID" class="input" style="width: 20%"><br>
      FIRST NAME :  <input type="text" name="first_name" class="input" style="width: 20%"><br>
      LAST NAME :   <input type="text" name="last_name" class="input" style="width: 20%"> <br>
      <input type="submit" value="Submit" id="submit-button" style="height: 38px">
   </form>
   <br>
   <hr>
   <br>
   <h1>BEGIN CREATING A NEW TICKET HERE!</h1>
   <form method="POST" action="/tickets" autocomplete="off" class="ticket-form">
      @csrf
      FIRST NAME : <br><input type="text" name="first_name" class="input"><br>
      LAST NAME : <br><input type="text" name="last_name" class="input"><br>
      CONTACT NUMBER : <br><input type="text" name="contactNum" class="input"><br>
      EMAIL : <br><input type="email" name="email" class="input"><br>
      DESCRIPTION : <br><textarea name="description" class="input-box"></textarea><br>
      <input type="submit" value="Submit" id="submit-button">
   </form>
@endsection