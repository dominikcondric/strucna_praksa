@extends('layout')


@section('links')
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
@endsection

@section('content')

    {{-- <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/home') }}">Home</a>
                @else
                    <a href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif --}}

        @if (\App\User::$loggedIn)
            <div id="welcome-item" style="margin: 50px">
                <h2><big>You may ask yourself what ticketing system is...</big></h2>
                <p style="font-size: 30px; margin: 30px">Well, according to Wikipedia : <i>"An issue tracking system (also ITS, trouble ticket system, 
                    support ticket, request management or incident ticket system) 
                    is a computer software package that manages and maintains lists of issues.
                    Issue tracking systems are generally used in collaborative settings—especially 
                    in large or distributed collaborations—but can also be employed by individuals 
                    as part of a time management or personal productivity regime. These systems often 
                    encompass resource allocation, time accounting, priority management, and oversight
                    workflow in addition to implementing a centralized issue registry."</i></p>
            </div>
        @else 
            <h1 style="text-align: center; margin-top: 70px; font-size: 100px; margin-bottom: 20px">CREATE A NEW:</h1> 
            <table style="margin-bottom: 70px">
                <td>
                    <div style="margin-left: 20%">
                        <form action="/tickets/create" style="display: inline">
                            <button class="create-button">TICKET</button>
                        </form>    

                       <form action="/comments/create" style="display: inline">
                            <button class="create-button">COMMENT</button>
                        </form>    

                        <form action="/states" style="display: inline">
                            <button class="create-button">STATE</button>
                        </form>    

                        <form action="/users/create" style="display: inline">
                            <button class="create-button">USER</button>
                        </form>    
                    </div>
                </td>
            </table>
        @endif
        
@endsection