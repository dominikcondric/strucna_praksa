@extends('layout')

@section('links')
    <link rel="stylesheet" href="{{ asset('css/tickets.css') }}"> 
    <link rel="stylesheet" href="{{ asset('css/general.css') }}"> 
@endsection

@section('content')

    <table style="font-size: xx-large; padding-left: 50px; width: 100%">
        @foreach (\App\Comment::where('user_id', \App\User::$loggedIn['id'])->get() as $comment)   
        <tr>
            <td style="padding-right: 250px">
                <p><b>Comment: </b> {{ $comment->comment }}</p>
                <p><b>Ticket ID:  </b>{{ $comment->ticket->id }}</p>    
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
        @endforeach
</table>
@endsection