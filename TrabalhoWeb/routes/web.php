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



Route::get('/',['as'=>'login','uses'=>'Login@index']);
Route::post('/login/entrar',['uses' =>'Login@entrar','as'=> 'site.login.entrar']);

Route::get('/addFilme',['as'=>'addFilme','uses'=>'Adm@index']);
Route::post('/addFilmeSalvar',['as'=>'addFilme.salvar','uses'=>'Adm@add']);

Route::group(['middleware'=>'auth'], function(){
    Route::get('/home',['as'=>'home','uses'=>'Principal@index']);
    Route::get('/pesquisaFilme',['as'=>'pesquisa','uses'=>'Principal@pesquisaFilme']);
});
