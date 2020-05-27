@extends('layout')


@section('links')
    <link rel="stylesheet" href="{{ asset('css/tickets.css') }}">  
@endsection

@section('content')
    <div id="ticket-id">
        <table>
            @foreach ($tickets as $ticket)   
            <tr>
                <td style="padding-right: 500px">
                    <h2>Name: {{ $ticket->last_name }}, {{ $ticket->first_name }}</h2>
                    <p>Contact number: {{ $ticket->contactNum }}</p>
                    <p>Email: {{ $ticket->email }}</p>
                    <p>Description: {{ $ticket->description }}</p>
                    <hr>
                </td>
                <td>
                    <h1>State: {{ $ticket->state }}</h1>
                </td>
            </tr>
            @endforeach
        </table>
    </div>

@endsection