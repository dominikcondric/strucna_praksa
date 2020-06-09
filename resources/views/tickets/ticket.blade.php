@extends('layout')

@section('links')
    <link rel="stylesheet" href="{{ asset('css/tickets.css') }}">
    <link rel="stylesheet" href="{{ asset('css/general.css') }}">
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
        <td>
            <form action={{ "/tickets/$ticket->id/edit" }} style="display: inline; position:absolute; margin-left: 200px; top: 50px">
                <button class="edit-button">EDIT</button>
            </form>
        </td>
    </tr>

    <tr>
        <td class="ticket-table-item">Contact number: </td>
        <td>{{ $ticket->contactNum }}</td>
    </tr>

    <tr>
        <td class="ticket-table-item">Email: </td>
        <td>{{ $ticket->email }}</td>
        <td>
            <form method="POST" action={{ "/tickets/$ticket->id" }} style="display: inline; margin-left: 200px; top: 160px">
                @csrf
                @method('DELETE')
                <button class="edit-button">DELETE</button>
            </form>
        </td>
    </tr>

    <tr>
        <td class="ticket-table-item">Description: </td>
        <td style="max-width: 400px">{{ $ticket->description }}</td>
    </tr>

    <tr>
        <td class="ticket-table-item">Users assigned to the ticket: </td>
        <td style="max-width: 400px">
            @foreach ($ticket->users as $user)
                @if (!$loop->last)
                    {{ "$user->first_name $user->last_name," }}
                @else
                    {{ "$user->first_name $user->last_name" }}
                @endif
            @endforeach
        </td>
    </tr>
    
    <tr>
        <td>Current state: </td>
        @if ($ticket->users->contains(\App\User::$loggedIn))
            <td>
                <form method="POST" action="/tickets/{{$ticket->id}}" style="display: inline">
                    @csrf
                    @method('PUT')
                    <select name="state" id="select-menu">
                        @foreach (\App\State::all() as $state)
                        <option value="{{ $state->id }}" 
                            @if ($ticket->state->state == $state->state)
                            selected="selected"
                            @endif>
                            {{ $state->state }}</option>
                        @endforeach
                    </select>
            </td>

            <td>
                <input type="submit" value="STATE" class="edit-button" style="height: 50px; width: 150px; margin-left: 190px">
                </form>
            </td>

            <tr>
                <td class="ticket-table-item">Assign additional users to the ticket: </td>

                <td class="ticket-table-item">
                    <form action="/tickets/{{$ticket->id}}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="number" name="usersNum" class="input">
                </td>

                <td class="ticket-table-item">
                        <input type="submit" value="ASSIGN" class="edit-button" style="height: 50px; width: 150px; margin-left: 190px">
                    </form>    
                </td>
            </tr>
        @else 
        <td>
            {{ $ticket->state->state }}
        </td>
        @endif
    </tr>

    <tr> <td><br>Comments: </td></tr>
</table> 

<table class="index-table" style="margin-top: 70px">
    <tr>
        <td class="index-table-item" style="text-align: center; width: 20%"><h3>Comment No: </h3><hr></td>    
        <td class="index-table-item" style="text-align: center; width: 20%"><h3>Author: </h3><hr></td>
        <td class="index-table-item" style="text-align: center; width: 50%"><h3>Comment: </h3><hr></td>
    </tr>    

    @foreach ($ticket->comments as $comment)
        <tr>
            <td class="index-table-item" style="text-align: center; width: 20%">
                <h2>{{ "$loop->iteration." }}</h2> 
            </td>    

            <td class="index-table-item" style="text-align: center; width: 20%">
                <h4>{{ $comment->user->first_name }} {{ $comment->user->last_name }}</h4>
            </td>

            @if($comment->user->id == \App\User::$loggedIn)
                <td class="index-table-item" style="width: 50%">
                    <form action="/comments/{{ $comment->id }}" method="POST">
                        @csrf
                        @method('PUT')
                        <textarea name="comment" class="input-box" style="height: 100px; width: 100%; border: none">{{ $comment->comment }}</textarea>
                </td>

                <td>
                        <input type="submit" value="UPDATE" class="edit-button" style="height: 40px">
                    </form>    

                    <form action="/comments/{{ $comment->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="edit-button" style="height: 40px; margin-top: 5px">DELETE</button>
                    </form>
                </td>
            @else 
                <td class="index-table-item" style="width: 50%">
                    <p>{{ $comment->comment }}</p>
                </td>
            @endif
            
        </tr> 
    @endforeach
</table>


@if ($ticket->users->contains(\App\User::$loggedIn))    
    <form method="POST" action="/comments" style="margin-top: 100px" class="ticket-form">
        @csrf
        <h3>Write a comment about this ticket: </h3>   
        <textarea  style="display: block" name="comment" class="input-box"></textarea>
        <input type="hidden" name="ticket" value="{{ $ticket->id }}">
        <input type="hidden" name="user" value="{{ \App\User::$loggedIn }}">
        <input type="submit" class="submit-button" style="margin-top: 10px" value="SUBMIT">
    </form>
@endif
    
@endsection