@extends('layout')

@section('content')
<table style="font-size: x-large; padding-left: 50px">
    @foreach ($comments as $comment)   
    <tr>
        <td style="padding-right: 250px">
            <h2>Author: {{ $comment->user->first_name }}, {{ $comment->user->last_name }}</h2>
            <p>Comment: {{ $comment->comment }}</p>
            <p>Tickets assigned to the comment: 
                @foreach ($comment->tickets as $ticket)
                    {{ $ticket->id }}, {{ $ticket->state->state }} {{ "\n" }}<br>
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