@extends('layout')

@section('links')
    <link rel="stylesheet" href="{{ asset('css/general.css') }}">
    <link rel="stylesheet" href="{{ asset('css/states.css') }}">
@endsection

@section('content')
    <table class="state-table">
        <tr>
            <td class="index-table-item"><h1>STATE: </h1></td>
            <td class="index-table-item"><h1>{{ $state->id }}</h1></td>
            <td class="index-table-item">
                <form method="POST" action="/states/{{ $state->id }}">
                    @csrf
                    @method('PUT')
                    <input type="text" name="state" id="input" style="width: 100%; border: none; font-size: 50px" value="{{ $state->state }}">
            </td>

            <td>
                    <button class="edit-button"  style="width: 140px; height: 60px; font-size: 25px">UPDATE</button>
                </form>    
            </td>
        </tr>
</table>

<table class="state-table" style="margin-top: 50px">
    <tr>
        <td class="index-table-item" style="width: 33%">
            <h1>Apply state to tickets: </h1>
        </td>

        <td class="index-table-item" style="width: 33%">
            <form method="POST" action="/tickets/changeStates">
                @csrf
                @method('PUT')
                <select name="tickets[]" id="select-menu" multiple>
                    @foreach (\App\Ticket::all() as $ticket)
                        <option value="{{ $ticket->id }}"
                            @if ($ticket->state->id == $state->id)
                                selected="selected"
                            @endif    
                        >{{ "$ticket->id - $ticket->first_name $ticket->last_name" }}</option>
                    @endforeach
                </select>
                <input type="hidden" name="state" value="{{ $state->id }}">
        </td>

        <td class="index-table-item" style="width: 33%">
                <button class="edit-button"  style="width: 140px; height: 60px; font-size: 25px">APPLY</button>
            </form>    
        </td>
    </tr>
</table>
        
    @if($state->id != 1)
        <form action="/states/{{ $state->id }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="edit-button" style="position: relative; margin-top: 50px; margin-left: 39%;
            width: 300px; height: 100px; font-size: 30px">DELETE STATE</button>
        </form>    
    @endif

    
@endsection