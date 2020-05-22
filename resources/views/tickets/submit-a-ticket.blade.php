@extends('layout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/tickets.css') }}">
   <div id="ticket-form">
      <form method="POST" action="/tickets" autocomplete="off" id="form-content">
         @csrf
         First name : <br><input type="text" name="first-name" class="input"><br>
         Last name : <br><input type="text" name="last-name" class="input"><br>
         Contact number : <br><input type="text" name="contactnum" class="input"><br>
         Email : <br><input type="email" name="email" class="input"><br>
         Description : <br><textarea name="description" cols="30" rows="10" style="width: 80%; font-size: 20px"></textarea><br>
        <input type="submit" value="Submit" id="submit-button">
      </form>
   </div>
@endsection