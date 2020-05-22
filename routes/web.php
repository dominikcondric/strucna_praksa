<?php

use App\Http\Controllers\TicketController;
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
    return view('role');
});

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/tickets', 'TicketController@index');

Route::get('/tickets/submit-a-ticket', 'TicketController@create');

Route::post('/tickets', 'TicketController@store');

Route::get('/faq', function () {
    return view('faq');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::redirect('/{any}', '/welcome');
    