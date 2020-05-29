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

////////////////////////////////////////////////////////////// TICKETS

Route::get('/tickets', 'TicketController@index');

Route::get('/tickets/create', 'TicketController@create');

Route::get('/tickets/thanks', function () {
    return view('tickets.thanks');
});

Route::post('/tickets/search', 'TicketController@search');

Route::get('/tickets/{ticket}', 'TicketController@show');

Route::post('/tickets', 'TicketController@store');

Route::get('/tickets/{ticket}/edit', 'TicketController@edit');

Route::put('/tickets/{ticket}', 'TicketController@update');

////////////////////////////////////////////////////////////// COMMENTS

Route::get('/comments', 'CommentController@index');

Route::get('/comments/comment', 'CommentController@show');

Route::post('/comments', 'CommentController@store');

////////////////////////////////////////////////////////////// GENERAL

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
    