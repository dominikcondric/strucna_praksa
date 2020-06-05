@extends('layout')

@section('links')
<link rel="stylesheet" href="{{ asset('css/general.css') }}"> 
<link rel="stylesheet" href="{{ asset('css/comments.css') }}"> 
@endsection

@section('content')
<table class="index-table">
    <tr>
        <td class="index-table-item"><h2>ID: </h2></td>
        <td class="index-table-item">{{ $comment->id }}</td>
    </tr>

    <tr>
        <td class="index-table-item" ><h2>Comment: </h2></td>
        <td class="index-table-item">{{ $comment->comment }}</td>
    </tr>

    <tr>
        <td class="index-table-item"><h2>Tickets assigned: </h2></td>
        <td class="index-table-item">
            @foreach ($comment->tickets as $ticket)
                {{ $ticket->id }}
            @endforeach
        </td>
    </tr>

    <form action="/comments/{{ $comment->id }}" method="POST">
        @csrf
        @method('DELETE')
        <button class="edit-button">DELETE</button>
    </form>

    <form action="/comments/{{ $comment->id }}/edit">
        <button class="edit-button">EDIT</button>
    </form>
    
</table> 
@endsection