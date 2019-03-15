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

Route::get('/', 'MonControleur@index');
Route::get('/utilisateur/{id}', 'MonControleur@utilisateur')->where("id","[0-9]+");
Route::get('/suivre/{id}', 'MonControleur@suivre')->where("id","[0-9]+")->middleware(Auth::id());
Route::get('nouvelle','MonControleur@nouvelle')->middleware('auth');
Route::post('creer','MonControleur@creer')->middleware('auth');
Route::get('/recherche/{s}', 'MonControleur@recherche');
Route::get('/testajax', 'MonControleur@testajax');

Auth::routes();


