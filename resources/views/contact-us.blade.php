@extends('layout')

@section('links')
    <link rel="stylesheet" href="{{ asset('css/clients.css') }}">
@endsection

@section('content')
   <div id="grid-box">
        <div class="grid-item">
            <h2>Main address</h2><hr>
            Oak Street 21,
            San Diego,
            California
        </div>

        <div class="grid-item">
            <h2>Other offices</h2><hr>
            <ul>
                <li>Sesame Street 62, Bronx, New York City</li>
                <li>Old Street 11, Chicago</li>
            </ul>
        </div>

        <div class="grid-item">
            <h2>Contacts</h2><hr>
            <ul>
                <li><big>Tel: </big> 01 0312 0321</li>
                <li><big>Phone:</big> +1 932 213 321</li>
                <li><big>E-mail:</big> ticketingsystem@mail.com</li>
            </ul>    
        </div>   

        <div class="grid-item">
            <h2>Social Media</h2><hr>
            <ul>
                <li><big>Facebook:</big> TheTicketingSystem</li>
                <li><big>Instagram:</big> theticketingsystem</li>
                <li><big>Twitter:</big> {{ "@theTicketingSystem" }}</li>
            </ul>    
        </div>
   </div>
@endsection