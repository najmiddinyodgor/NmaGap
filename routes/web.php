<?php

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

Auth::routes();

Route::middleware('auth')->group(function() {
    Route::get('/', function () {
        return redirect()->route('chat');
    });

    Route::get('/chat', 'ChatController@index')
        ->name('chat');

    Route::get('/messages/update/{id}', 'MessageController@get')
        ->name('messages.get');

    Route::post('/messages/{id}', 'MessageController@store')
        ->name('message.create');

    Route::get('/dialog/{id}', 'DialogController@index')
        ->name('dialog');


    Route::get('/update-status', 'UserController@updateStatus');

    Route::get('/online-users', 'UserController@getOnlineUsers');

    Route::get('/search', 'UserController@searchUsers');

    Route::get('/profile', 'UserController@profile');

    Route::put('/profile/avatar', 'UserController@changeAvatar')->name('avatar');
    Route::put('/profile/login', 'UserController@changeLogin')->name('login');

});
