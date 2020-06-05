@extends('layout')

@section('links')
    <link rel="stylesheet" href="{{ asset('css/general.css') }}">
    <link rel="stylesheet" href="{{ asset('css/states.css') }}">
@endsection

@section('content')
    <table id="state-table">
        <tr>
            <td class="index-table-item"><h1>STATE: </h1></td>
            <td class="index-table-item"><h1>{{ $state->id }}</h1></td>
            <td class="index-table-item">
                <form method="POST" action="/states/{{ $state->id }}">
                    @csrf
                    <input type="text" name="state" id="input" style="width: 100%; border: none; font-size: 50px" value="{{ $state->state }}">
            </td>
        </tr>
    </table>
        
        <button class="edit-button" style="display: inline;  position: absolute; left: 20%; margin-top: 50px; width: 300px; height: 150px; font-size: 35px">UPDATE</button>
    </form>    

    <form action="/states/{{ $state->id }}" method="POST">
        @csrf
        @method('DELETE')
        <button class="edit-button" style="display: inline; position: absolute; right: 20%; margin-top: 50px; width: 300px; height: 150px; font-size: 35px">DELETE</button>
    </form>    


    
@endsection