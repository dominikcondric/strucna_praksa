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
        <td>
            <form method="POST" action="/tickets/{{$ticket->id}}">
                @csrf
                @method('PUT')
                <select name="state" class="input" style="width: 200px; font: inherit; color: inherit; border:none">
                    @foreach (\App\State::all() as $state)
                    <option value="{{ $state->id }}" @if ($ticket->state->state == $state->state)
                         selected="selected"
                    @endif>{{ $state->state }}</option>
                    @endforeach
                </select>
                <input type="submit" value="CHANGE" class="edit-button" style="height: 40px; width: 150px; position: absolute; top: 250px; right: 215px">
            </form>
        </td>
    </tr>
</table> 

<form action={{ "/tickets/$ticket->id/edit" }} style="display: inline; position:absolute; margin-left: 200px; top: 50px">
    <button class="edit-button">EDIT</button>
</form>

<form method="POST" action={{ "/tickets/$ticket->id" }} style="display: inline; position:absolute; margin-left: 200px; top: 160px">
    @csrf
    @method('DELETE')
    <button class="edit-button">DELETE</button>
</form>

{{-- @if (\App\User::$loggedIn == $ticket->users)     --}}
    <form method="POST" action="/comments" style="margin-top: 100px" class="ticket-form">
        @csrf
        <h3>Write a comment about this ticket: </h3>   
        <textarea  style="display: block" name="comment" class="input-box"></textarea>
        <input type="hidden" name="ticket" value="{{ $ticket->id }}">
        By User: <input type="number" name="user" class="input" style="width: 20%">
        <input type="submit" class="submit-button" style="margin-left: 50px" value="SUBMIT">
    </form>
{{-- @endif --}}
    
@endsection