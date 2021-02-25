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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('todo','TodoController');
Route::resource('student','StudentController');
Route::resource('product','ProductController');

Route::get('/loader', function () {
    return view('loader');
});

Route::get('/mf', function () {
    return view('multiform');
});

Route::get('/lazy', function () {
    return view('lazy-loading');
});

Route::get('pdf','PdfController@pdf');