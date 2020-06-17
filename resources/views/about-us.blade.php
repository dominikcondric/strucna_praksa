@extends('layout')

@section('links')
    <link rel="stylesheet" href="{{ asset('css/clients.css') }}">
@endsection

@section('content')
<div id="about-us">
    <h1>About our company</h1><hr>
    <p>Our company was founded back in 1992, but the ticketing system idea came in 1995 since we started to grow really rapidly.
        The idea was fairly simple...let's implement a system that could make problem solving as easy as possible.
       Since our company is growing on a daily basis, we had to make a system that could handle all clients needs and have a good
        infrastructure. Because of that, we implemented a ticketing system that stores all of your problems in digital ticket format 
        so our employees can, at any time, see the state of the ticket. We are constatly working on the system so we can make our customers satisfied
        with our services. If you want more info, you can always come and visit us on social media, or come in person.
    </p>
</div>
@endsection