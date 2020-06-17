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

////////////////////////////////////////////////////////////// TICKETS

Route::get('/tickets', 'TicketController@index')->middleware('auth');

Route::post('/tickets/search', 'TicketController@search')->middleware('auth');

Route::get('/tickets/create', 'TicketController@create')->middleware('auth');

Route::get('/tickets/{ticket}', 'TicketController@show')->middleware('auth');

Route::post('/tickets', 'TicketController@store')->middleware('auth');

Route::put('/tickets/changeStates', 'TicketController@changeStates')->middleware('auth');

Route::get('/tickets/{ticket}/edit', 'TicketController@edit')->middleware('auth');

Route::put('/tickets/{ticket}', 'TicketController@update')->middleware('auth');

Route::delete('/tickets/{ticket}', 'TicketController@destroy')->middleware('auth');

Route::put('/tickets/{ticket}/addUsers', 'TicketController@addUsers')->middleware('auth');

Route::put('/tickets/{ticket}/removeUsers', 'TicketController@removeUsers')->middleware('auth');

Route::put('/tickets/{ticket}/changeState', 'TicketController@changeState')->middleware('auth');

Route::put('tickets/{ticket}/request', 'TicketController@request')->middleware('auth');

Route::get('/find-your-ticket', function () {
    return view('find-your-ticket', [
        'ticket' => null
    ]);
});

Route::post('/find-your-ticket', 'TicketController@findClient');

////////////////////////////////////////////////////////////// COMMENTS

Route::get('/comments', 'CommentController@index')->middleware('auth');

Route::get('/comments/create', 'CommentController@create')->middleware('auth');

Route::get('/comments/{comment}', 'CommentController@show')->middleware('auth');

Route::post('/comments', 'CommentController@store')->middleware('auth');

Route::put('/comments/{comment}', 'CommentController@update')->middleware('auth');

Route::delete('/comments/{comment}', 'CommentController@destroy')->middleware('auth');

////////////////////////////////////////////////////////////// STATES

Route::get('/states','StateController@index')->middleware('auth');

Route::post('/states', 'StateController@store')->middleware('auth');

Route::put('/states/{state}', 'StateController@update')->middleware('auth');

Route::get('/states/{state}', 'StateController@show')->middleware('auth');

Route::delete('/states/{state}', 'StateController@destroy')->middleware('auth');

////////////////////////////////////////////////////////////// USERS

Route::get('/users','UserController@index')->middleware('auth');

Route::get('/users/{user}/edit','UserController@edit')->middleware('auth');

Route::post('/users/login', 'UserController@login')->middleware('auth');

Route::put('/users/{user}', 'UserController@update')->middleware('auth');

Route::get('/users/{user}', 'UserController@show')->middleware('auth');

Route::delete('/users/{user}', 'UserController@destroy')->middleware('auth');

Route::put('/users/{user}/promote', 'UserController@promote')->middleware('auth');

////////////////////////////////////////////////////////////// GENERAL

Route::get('/faq', function () {
    return view('faq');
});

Route::get('/about-us', function () {
    return view('/about-us');
});

Route::get('/contact', function () {
    return view('contact-us'); 
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::redirect('/{any}', '/');
    
