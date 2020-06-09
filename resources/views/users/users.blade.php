@extends('layout')


@section('links')
    <link rel="stylesheet" href="{{ asset('css/tickets.css') }}">  
    <link rel="stylesheet" href="{{ asset('css/general.css') }}">
@endsection

@section('content')
    @if (\App\User::count() == 0 || \App\User::where(['id' => \App\User::$loggedIn, 'admin' => 1])->exists())
        <form action="/users/create" style="margin-bottom: 70px; margin-top: 70px; padding-left: 50px; text-align:center">
            <button class="edit-button" style="width: 40%; height: 75px;">CREATE A NEW USER</button>
        </form>
    @endif    

    <table class="index-table">
        @foreach ($users as $user)   
        <tr>
            <td class="index-table-item" style="text-align: start; width: 50%">
                <h2>USER-ID: {{ $user->id }} </h2>
                <b>Name:</b> {{"$user->first_name $user->last_name" }}
                <p><b>Email:</b> {{ $user->email }}</p>
                <p><b>Tickets assigned to user:</b> 
                    @foreach ($user->tickets as $ticket)
                        @if (!$loop->last)
                            {{ "$ticket->first_name $ticket->last_name," }}
                        @else
                            {{ "$ticket->first_name $ticket->last_name" }}
                        @endif
                    @endforeach
                </p>
                <hr>
                <br>
            </td>

            <td class="index-table-item" style="text-align: end; width: 50%">
                <form action="/users/{{ $user->id }}">
                    <button class="edit-button" style="width: 200px; height: 100px; font-size: 35px">SHOW</button>
                    <br>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

@endsection