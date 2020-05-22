@extends('layout')

@section('content')
<div class="container">
    <div style="grid-row: 1/3" href="/welcome">
        <h1 style="font-size: 100px">Choose your role</h1>
    </div>
    <div class="container-item">
        <a href="/welcome"><h1>User</h1></a>
        <p>*Login required!</p>
    </div>   
    <div class="container-item">
        <a href="/welcome"><h1>Client</h1></a>
    </div>   
</div>
@endsection