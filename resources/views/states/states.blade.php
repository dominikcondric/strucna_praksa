@extends('layout')

@section('links')
    <link rel="stylesheet" href="{{ asset('css/general.css') }}">
    <link rel="stylesheet" href="{{ asset('css/states.css') }}">
@endsection

@section('content')
    <table class="index-table">
        <tr>
            <td class="index-table-item"><h1>New: </h1></td>
            <td class="index-table-item">
                <form action="/states" method="POST">
                    @csrf
                    <input type="text" id="input" name="state">
            </td>    

            <td class="index-table-item">
                    <input type="submit" value="CREATE" class="edit-button">
                </form>
            </td>
        </tr>

        <tr>
            <td class="index-table-item" style="padding-top: 70px"><h1>State No: </h1></td>
            <td class="index-table-item" style="padding-top: 70px"><h1>State: </h1></td>    
        </tr>

        @foreach (\App\State::all() as $state)
            <tr>
                <td class="index-table-item">
                    <h1>{{ $state->id }}</h1>
                </td>

                <td class="index-table-item" style="width: 700px">
                    <h1>{{ $state->state }}</h1>
                </td>

                <td class="index-table-item">
                    <form action="/states/{{ $state->id }}">
                        <button class="edit-button">SHOW</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection