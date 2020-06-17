@extends('layout')

@section('links')
<link rel="stylesheet" href="{{ asset('css/general.css') }}">
<link rel="stylesheet" href="{{ asset('css/users.css') }}">
@endsection

@section('content')

<table class="index-table" style="font-size: 40px; padding-top: 50px; width: 100%; display: inline">
    <tr>
        <td class="index-table-item" style="padding-top: 20px">ID:</td>
        <td>{{ $user->id }}</td>
    </tr>

    <tr>
        <td class="index-table-item" style="padding-top: 20px">Name:</td>
        <td>{{ $user->last_name }}, {{ $user->first_name }}</td>
    </tr>

    <tr>
        <td class="index-table-item" style="padding-top: 20px">Email: </td>
        <td>{{ $user->email }}</td>
    </tr>

    <tr>
        <td class="index-table-item" style="padding-top: 20px">Admin</td>
        <td>@if ($user->admin) {{ "Yes" }} @else {{ "No" }} @endif</td>
    </tr>

    <tr>
        <td class="index-table-item" style="padding-top: 20px">Tickets given to the user: </td>
        <td style="max-width: 400px">
            @foreach ($user->tickets as $ticket)
                @if (!$loop->last)
                    {{ "$ticket->id - $ticket->first_name $ticket->last_name," }}
                @else
                    {{ "$ticket->id - $ticket->first_name $ticket->last_name" }}
                @endif
            @endforeach
        </td>
    </tr>
</table>

<span style="position: absolute; right: 10%; width: 20%; margin-left: 150px; text-align:center">
    @if (Auth::user()->admin)
        <form method="POST" action={{ "/users/$user->id" }} style="margin-top: 100px">
            @csrf
            @method('DELETE')
            <button class="edit-button" style="width: 200px; height: 100px; font-size: 40px; margin-bottom: 40px">DELETE</button>
        </form>
    @endif

    @if (Auth::id() == $user->id)
        <form action={{ "/users/$user->id/edit" }}>
            <button class="edit-button" style="width: 200px; height: 100px; font-size: 40px">EDIT</button>
        </form>
    @endif    
</span> 

@if (Auth::user()->admin && $user->admin == 0)
    <div id="admin">
        <form method="POST" action="/users/{{ $user->id }}/promote">
            @csrf
            @method('PUT')
            <input type="submit" value="PROMOTE TO ADMIN" id="admin-promote">
        </form>
    </div>
@endif
@endsection