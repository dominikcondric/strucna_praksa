@extends('layout')

@section('links')
    <link rel="stylesheet" href="{{ asset('css/tickets.css') }}"> 
@endsection

@section('content')
<table style="font-size: x-large; padding-left: 50px">
    @foreach ($comments as $comment)   
    <tr>
        <td style="padding-right: 250px">
            <h2>Comment: </h2> <p style="padding-left: 10px">{{ $comment->comment }}</p>
            <h3>Author: {{ $comment->user->first_name }} {{ $comment->user->last_name }}</h3>
            <p>Tickets assigned to the comment: 
                @foreach ($comment->tickets as $ticket)
                    {{ "$ticket->id\n" }}<br>
                @endforeach
            </p>
            <hr>
            <br>
        </td>

        <td>
            <form action="/comments/{{ $comment->id }}">
                <button class="edit-button">SHOW</button>
                <br>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection