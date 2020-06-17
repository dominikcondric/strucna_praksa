@extends('layout')

@section('links')
    <link rel="stylesheet" href="{{ asset('css/general.css') }}">
    <link rel="stylesheet" href="{{ asset('css/clients.css') }}">
@endsection

@section('content')
    <form method="POST" action="/find-your-ticket">
        @csrf
        <h1>FIND YOUR TICKET HERE</h1><hr><br> 
            <div><h2 style="display: inline">ID: </h2><input type="number" name="id" class="input"></div>
            <div><h2 style="display: inline">FIRST NAME:</h2> <input type="text" name="first_name" class="input"></div>
            <div><h2 style="display: inline">LAST NAME: </h2><input type="text" name="last_name" class="input"><br></div>
            <div><h2 style="display: inline">CONTACT NUMBER: </h2><input type="text" name="contactNum" class="input"><br></div>
            <div><input type="submit" value="FIND" class="edit-button" style="height: 40px"></div>
        </form>

    @if ($ticket != null) 
        <div style="margin-top: 70px">
            <h1>Information about your ticket</h1><hr>
            <ul>
                <li><h2>Your ticket is in state: {{ $ticket->state->state }}</h2></li>
                <li><h2>Number of users working on the ticket: {{ $ticket->users->count() }}</h2></li>
                <li><h2>Ticket submitted on: {{ $ticket->created_at }}</h2></li>
                <li><h2>Ticket last time updated on: {{ $ticket->updated_at }}</h2></li>
            </ul>
        </div>
    @endif
@endsection