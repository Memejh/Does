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

//Route::resource('articles','ArticleController');

Route::get('about_home', function () {
    return view('about_1');
});

Route::get('about_history', function () {
    return view('about_2');
});

Route::get('about_people', function () {
    return view('about_3');
});

Route::get('news', function () {
    return view('news');
});
Route::get('graduate', function () {
    return view('graduate');
});


Route::get('student', function () {
    return view('student');
});

Route::get('news', function () {
    return view('news');
});

Route::get('officer', function () {
    return view('officer');
});

Route::get('gallery', function () {
    return view('gallery');
});


Route::post('/insert','Controller@insert');