<?php

use App\Http\Controllers\TicketController;
use App\Ticket;
use Illuminate\Auth\Events\Failed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/tickets', 'TicketController@index');

Route::get('/tickets/create', 'TicketController@create');

Route::get('/tickets/thanks', function () {
    return view('tickets.thanks');
});

Route::get('/tickets/{ticket}', 'TicketController@show');

Route::post('/tickets', 'TicketController@store');

Route::post('/tickets/search', function (Request $request) {
    if (Ticket::where([
        ['id', '=', $request->ticketID],
        ['first_name', '=', $request->first_name],
        ['last_name', '=', $request->last_name]
        ])->exists()) {
        return redirect("/tickets/$request->ticketID/edit");
    } else {
       return redirect('/welcome');
    }
});

Route::get('/tickets/{ticket}/edit', 'TicketController@edit');

Route::put('/tickets/{ticket}', 'TicketController@update');

Route::get('/faq', function () {
    return view('faq');
});

Route::get('/about-us', function () {
    return view('/about-us');
});

Route::get('/contact', function () {
    return view('contact'); 
});

Route::redirect('/{any}', '/');
    