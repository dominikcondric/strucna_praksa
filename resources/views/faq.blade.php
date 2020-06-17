@extends('layout')

@section('links')
    <link rel="stylesheet" href="{{ asset('css/clients.css') }}">   
@endsection

@section('content')
<div id="faq">
    <div id="title-faq">Frenquently Asked Questions</div><hr><br>
    <div>
        <h3>How can i report a problem that i'm having?</h3>
        <p>Just give us a call and we will make a digital ticket to enter your problem to our database. After that, your ticket
             will be handled by our team how are working hard to solve your issue in the shortest amount of time.</p><br>
    </div>

    <div>
        <h3>How long does it take for you to solve issue that I'm experiencing?</h3>
        <p>The limit that we set for ourselves is two days, even tho that havily depends on how big and serious the problem is. Our team is working
            hard to solve every problem in the shortest amount of time, because our primary goal is to keep our customers happy. Anyway, we will keep
            you updated about the state your ticket is in and you can also check state of your ticket on our page if you know its unique ID
             that you get from our employee who answered your call.
        </p><br>
    </div>

    <div>
        <h3>Are you looking for additional employees?</h3>
        <p>Since we are a pretty big company, every so often we look for additional employees so you can always call us if 
            you want to work with us.</p><br>
    </div>

    <div>
        <h3>What is your working time?</h3>
        <p>You can call us on every working day from 8 A.M. till 8 P.M., or you can come to visit us every working day till 12 o'clock.</p><br>
    </div>
    

</div>
    
@endsection