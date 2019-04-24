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

Route::get('/horarios', function () {
    return view('site.pages.schedules');
})->name('pages.schedules');

Route::get('/cursos', function () {
    return view('site.pages.courses');
})->name('pages.courses');

Route::get('/contacto', function () {
    return view('site.pages.contact');
})->name('pages.contact');

Route::get('/quienes-somos', function () {
    return view('site.pages.about_us');
})->name('pages.about_us');

Route::get('/eventos-y-noticias', function () {
    return view('site.pages.events');
})->name('pages.events');

Route::get('/servicios', function () {
    return view('site.services');
})->name('pages.services');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//ADMIN
Route::resource('members', 'MembersController');
