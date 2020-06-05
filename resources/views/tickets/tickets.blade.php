@extends('layout')


@section('links')
    <link rel="stylesheet" href="{{ asset('css/tickets.css') }}">  
    <link rel="stylesheet" href="{{ asset('css/general.css') }}">
@endsection

@section('content')
    <form action="/tickets/create" style="margin-bottom: 70px; margin-top: 70px; padding-left: 50px; text-align:center">
        <button class="edit-button" style="width: 40%; height: 75px;">CREATE A NEW TICKET</button>
    </form>

    <form method="POST" action="/tickets/search" class="ticket-form" style="margin-bottom: 50px; padding-left: 25px">
        @csrf
    <h3>FIND THE TICKET HERE</h3> 
      <select name="field" id="select-search">
          <option value="id">ID</option>
          <option value="first_name">FIRST NAME</option>
          <option value="last_name">LAST NAME</option>
          <option value="contactNum">CONTACT</option>
          <option value="email">EMAIL</option>
      </select>
      <input type="search" name="search" class="input" style="width: 69%; height: 40px">
         
      <input type="submit" value="FIND" class="edit-button" style="height: 40px">
   </form>

    <table class="index-table">
        @foreach ($tickets as $ticket)   
        <tr>
            <td class="index-table-item" style="text-align: start; width: 40%">
                <h2>Name: {{ $ticket->last_name }}, {{ $ticket->first_name }}</h2>
                <b>Ticket-ID:</b> {{ $ticket->id }}
                <p><b>Contact number:</b> {{ $ticket->contactNum }}</p>
                <p><b>Email:</b> {{ $ticket->email }}</p>
                <p><b>Description:</b> {{ $ticket->description }}</p>
                <p><b>Users assigned to ticket:</b> 
                    @foreach ($ticket->users as $user)
                        @if (!$loop->last)
                            {{ "$user->first_name $user->last_name," }}
                        @else
                            {{ "$user->first_name $user->last_name" }}
                        @endif
                    @endforeach
                </p>
                <hr>
                <br>
            </td>

            <td class="index-table-item" style="text-align: center; width: 40%">
                <h1>State: {{ $ticket->state->state }}</h1>
                <br>
            </td>

            <td class="index-table-item" style="text-align: center; width: 40%">
                <form action="/tickets/{{ $ticket->id }}">
                    <button class="edit-button">SHOW</button>
                    <br>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

@endsection