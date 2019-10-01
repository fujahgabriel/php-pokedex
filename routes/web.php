<?php

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

Route::get('/', 'PokemonController@index');
Route::get('next/{id}', 'PokemonController@index');
Route::get('previous/{id}', 'PokemonController@index');
Route::post('search', 'PokemonController@search');
Route::get('getpokemon/{id}', 'PokemonController@getPokemon');

