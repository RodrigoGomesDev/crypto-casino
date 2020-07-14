<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Authorization");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

Route::namespace('Api')->group(function() {

    //Rota de login por api
    Route::post('/login', 'UserController@login')->name('login-api');

    //Rota de register por api
    Route::post('/register', 'UserController@register')->name('register-api');

    /*
    *   CRUD USER API
    */
    Route::get('/users', 'UserController@index')->name('users-api');
    Route::get('/user/{id}', 'UserController@show')->name('user-api');
    Route::post('/user/update/{id}', 'UserController@update')->name('update-api');
    Route::post('/user/delete/{id}', 'UserController@delete')->name('delete-api');


    //Rota de transações por api
    Route::get('/balance-users', 'BalanceController@index')->name('balance-api');
    
    //Rota de games por api
    Route::get('/games', 'GameController@index')->name('games-api');

    //Rota para mostrar o leaderboard dos usuários
    Route::get('/leaderboard', 'LeaderboardController@index')->name('leaderboard-api');
});