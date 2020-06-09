@extends('layout')

@section('links')
<link rel="stylesheet" href="{{ asset('css/general.css') }}">
<link rel="stylesheet" href="{{ asset('css/users.css') }}">
@endsection

@section('content')

<table class="index-table" style="font-size: 40px; padding-top: 50px; width: 100%">
    <tr>
        <td class="index-table-item" style="padding-top: 20px">ID:</td>
        <td>{{ $user->id }}</td>
    </tr>

    <tr>
        <td class="index-table-item" style="padding-top: 20px">Name:</td>
        <td>{{ $user->last_name }}, {{ $user->first_name }}</td>
        @if (\App\User::$loggedIn == $user->id)
            <td>
                <form action={{ "/users/$user->id/edit" }} style="margin-left: 200px">
                    <button class="edit-button">EDIT</button>
                </form>
            </td>
        @endif    
    </tr>

    <tr>
        <td class="index-table-item" style="padding-top: 20px">Email: </td>
        <td>{{ $user->email }}</td>
        @if (\App\User::$loggedIn == $user->id || \App\User::where(['id' => \App\User::$loggedIn, 'admin' => 1])->exists())
            <td>
                <form method="POST" action={{ "/users/$user->id" }} style="margin-left: 200px; margin-top: 50px">
                    @csrf
                    @method('DELETE')
                    <button class="edit-button">DELETE</button>
                </form>
            </td>
        @endif
            
    </tr>

    <tr>
        <td class="index-table-item" style="padding-top: 20px">Tickets given to the user: </td>
        <td style="max-width: 400px">
            @foreach ($user->tickets as $ticket)
                @if (!$loop->last)
                    {{ "$ticket->first_name $ticket->last_name," }}
                @else
                    {{ "$ticket->first_name $ticket->last_name" }}
                @endif
            @endforeach
        </td>
    </tr>
</table>

@endsection