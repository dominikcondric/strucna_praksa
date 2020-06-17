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
            <form action={{ "/tickets/$ticket->id/edit" }} style="margin-left: 190px">
                <button class="edit-button" style="height: 50px; width: 150px">EDIT</button>
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
        @if (Auth::user()->admin || $ticket->users->contains(Auth::id()))
            <td>
                <form method="POST" action={{ "/tickets/$ticket->id" }} style="margin-left: 190px">
                    @csrf
                    @method('DELETE')
                    <button class="edit-button" style="height: 50px; width: 150px">DELETE</button>
                </form>
            </td>
        @endif    
    </tr>

    <tr>
        <td class="ticket-table-item">Description: </td>
        <td style="max-width: 400px">{{ $ticket->description }}</td>
    </tr>

    <tr>
        <td class="ticket-table-item">Users assigned to the ticket: </td>
        @if (Auth::user()->admin && $ticket->users()->count() > 1)
            <td style="max-width: 400px">
                <form action="/tickets/{{ $ticket->id }}/removeUsers" method="POST">
                    @csrf
                    @method('PUT')
                    @foreach ($ticket->users as $user)
                            <select name="removedUsers[]" id="select-menu">
                                <option value="0">{{ "$user->first_name $user->last_name" }}</option>
                                <option value="{{ $user->id }}">Remove</option>
                            </select>
                    
                        @if(!$loop->last),@endif    
                    @endforeach
            </td>

            <td>
                    <input type="submit" value="REMOVE" class="edit-button" style="height: 50px; width: 150px; margin-left: 190px">
                </form>    
            </td>

        @else 
            <td>
                @foreach ($ticket->users as $user)
                    {{ "$user->first_name $user->last_name" }}
                    @if(!$loop->last),@endif    
                @endforeach
            </td>    
        @endif    

    </tr>

    @if (Auth::user()->admin)
        <tr>
            <td class="ticket-table-item">Assign additional users to the ticket: </td>

            <td class="ticket-table-item" style="padding-top: 20px">
                <form action="/tickets/{{$ticket->id}}/addUsers" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="number" name="usersNum" class="input" style="width: 60px">
                    <select name="newUser" id="select-menu" style="border-style: solid; border-width: 2px">
                        <option value="0">-</option>
                        @foreach (\App\User::all() as $addUser)
                            @if (!$ticket->users->contains($addUser))
                                <option value="{{$addUser->id}}">{{ "$addUser->first_name $addUser->last_name" }}</option>
                            @endif    
                        @endforeach
                    </select>
            </td>

            <td class="ticket-table-item">
                    <input type="submit" value="ASSIGN" class="edit-button" style="height: 50px; width: 150px; margin-left: 190px"> 
                </form>    
            </td>
        </tr>
    @endif

    <tr>
        <td>Current state: </td>
        @if ($ticket->users->contains(Auth::id()) || Auth::user()->admin)
            <td>
                <form method="POST" action="/tickets/{{$ticket->id}}/changeState" style="display: inline">
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
                    <input type="submit" value="UPDATE STATE" class="edit-button" style="height: 50px; width: 150px; margin-left: 190px; font-size: 17px">
                </form>
            </td>

            @else 
                <td>
                    {{ $ticket->state->state }}
                </td>
            @endif
    </tr>
</table> 

<div id="userRequest">
    @if ($ticket->users->contains(Auth::id()) && !Auth::user()->admin && $ticket->users->count() < \App\User::count())
        <form action="/tickets/{{$ticket->id}}/request" method="POST">
            @csrf
            @method('PUT')
            <button class="requestLabel">
                @if (!$ticket->usersRequest)
                    {{"Request more users!"}}
                @else 
                    {{"Request already sent! Want to withdraw it?"}}    
                @endif    
            </button>
        </form>
    @endif

    @if (Auth::user()->admin && $ticket->usersRequest)
        <div id="admin-request">More users requested!</div>
    @endif
</div>

<div style="margin-top: 50px"><h2>Comments: </h2></div>
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

            @if($comment->user->id == Auth::id())
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


@if ($ticket->users->contains(Auth::id()))    
    <form method="POST" action="/comments" style="margin-top: 100px" class="ticket-form">
        @csrf
        <h3>Write a comment about this ticket: </h3>   
        <textarea  style="display: block" name="comment" class="input-box"></textarea>
        <input type="hidden" name="ticket" value="{{ $ticket->id }}">
        <input type="hidden" name="user" value="{{ Auth::id() }}">
        <input type="submit" class="submit-button" style="margin-top: 10px" value="SUBMIT">
    </form>
@endif
    
@endsection