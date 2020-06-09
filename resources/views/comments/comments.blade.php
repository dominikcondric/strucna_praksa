@extends('layout')

@section('links')
    <link rel="stylesheet" href="{{ asset('css/tickets.css') }}"> 
    <link rel="stylesheet" href="{{ asset('css/general.css') }}"> 
@endsection

@section('content')

    <table style="font-size: xx-large; padding-left: 50px; width: 100%">
        @foreach (\App\User::find(\App\User::$loggedIn)->comments()->orderby('ticket_id')->get() as $comment)   
        @if ($loop->first || $previous != $comment->ticket->id)    
            <tr>
                <td>
                    <h1>Ticket {{ $comment->ticket->id }}.</h1>
                </td>
            </tr>
        @endif

        <tr>
            <td style="padding-right: 250px; padding-left: 100px">
                <p><b>{{ $loop->iteration }}: </b> {{ $comment->comment }}</p>
                <hr>
                <br>
            </td>

            <td>
                <form action="/tickets/{{ $comment->ticket->id }}">
                    <button class="edit-button" style="height: 70px">SHOW TICKET</button>
                    <br>
                </form>
            </td>
        </tr>

        @php
            $previous = $comment->ticket->id;
        @endphp
        @endforeach
</table>
@endsection