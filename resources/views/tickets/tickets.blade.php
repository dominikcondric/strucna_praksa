@extends('layout')


@section('links')
    <link rel="stylesheet" href="{{ asset('css/tickets.css') }}">  
@endsection

@section('content')
    <form action="/tickets/create" style="margin-bottom: 70px; margin-top: 70px; padding-left: 50px; text-align:center">
        <button class="edit-button" style="width: 40%; height: 75px;">CREATE A NEW TICKET</button>
    </form>

    <form method="POST" action="/tickets/search" class="ticket-form" style="margin-bottom: 50px; padding-left: 50px">
        @csrf
    <h3>FIND THE TICKET HERE</h3> 
      <select name="field" id="select-menu">
          <option value="id">ID</option>
          <option value="first_name">FIRST NAME</option>
          <option value="last_name">LAST NAME</option>
          <option value="contactNum">CONTACT</option>
          <option value="email">EMAIL</option>
      </select>
      <input type="search" name="search" class="input" style="width: 69%; height: 40px">
         
      <input type="submit" value="FIND" class="edit-button" style="height: 40px">
   </form>

    <table style="font-size: x-large; padding-left: 50px">
        @foreach ($tickets as $ticket)   
        <tr>
            <td style="padding-right: 250px">
                <h2>Name: {{ $ticket->last_name }}, {{ $ticket->first_name }}</h2>
                <p>Ticket-ID: {{ $ticket->id }}</p>
                <p>Contact number: {{ $ticket->contactNum }}</p>
                <p>Email: {{ $ticket->email }}</p>
                <p>Description: {{ $ticket->description }}</p>
                <p>Users assigned to ticket: 
                    @foreach ($ticket->users as $user)
                        {{ "$user->first_name $user->last_name" }} <br>
                    @endforeach
                </p>
                <hr>
                <br>
            </td>

            <td style="padding-right: 250px">
                <h1>State: {{ $ticket->state->state }}</h1>
                <br>
            </td>

            <td>
                <form action="/tickets/{{ $ticket->id }}">
                    <button class="edit-button">SHOW</button>
                    <br>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

@endsection