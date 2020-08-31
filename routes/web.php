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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/listeEntreprise/{rechercher?}','EntrepriseController@index');
Route::post('/listeEntreprise','EntrepriseController@store');
Route::get('/entreprises/edit/{id}','EntrepriseController@edit');
Route::patch('/entreprises/edit/{id}','EntrepriseController@update');
Route::delete('/entreprises/destroy/{id}','EntrepriseController@destroy');
