@extends('layout')

@section('links')
    <link rel="stylesheet" href="{{ asset('css/tickets.css') }}">
@endsection

@section('content')

<table id="ticket-table">
    <tr>
        <td class="ticket-table-item">ID:</td>
        <td>{{ $ticket->id }}</td>
    </tr>

    <tr>
        <td class="ticket-table-item">Name:</td>
        <td>{{ $ticket->last_name }}, {{ $ticket->first_name }}</td>
    </tr>

    <tr>
        <td class="ticket-table-item">Contact number</td>
        <td>{{ $ticket->contactNum }}</td>
    </tr>

    <tr>
        <td class="ticket-table-item">Email</td>
        <td>{{ $ticket->email }}</td>
    </tr>

    <tr>
        <td class="ticket-table-item">Description</td>
        <td>{{ $ticket->description }}</td>
    </tr>

    <tr>
        <td>Current state</td>
        <td>{{ $ticket->state->state }}</td>
    </tr>
</table> 

{{-- @if (\App\User::$loggedIn == $ticket->users)     --}}
    <form method="POST" action="/comments" style="margin-top: 100px">
        @csrf
        <h1>Write a comment about this ticket: </h1>   
        <textarea name="comment" class="input-box"></textarea>
        <input type="hidden" name="ticket" value="{{ $ticket->id }}">
        <input type="number" name="user">
        <input type="submit" class="submit-button" value="Submit">
    </form>
{{-- @endif --}}
    
@endsection