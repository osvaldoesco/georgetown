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

// Pages
Route::get('/','PagesController@home');

Route::get('/horarios', function () {
  return view('site.pages.schedules');
})->name('pages.schedules');

Route::get('/cursos','PagesController@courses')->name('pages.courses');

Route::get('/contacto', function () {
  return view('site.pages.contact');
})->name('pages.contact');

Route::get('/quienes-somos', 'PagesController@about_us')->name('pages.about_us');

Route::get('/gt_login', function(){
  return view('site.pages.login');
})->name('pages.gt_login');

Route::get('/eventos-y-noticias', function () {
  return view('site.pages.events');
})->name('pages.events');

Route::get('/servicios', function () {
  return view('site.services');
})->name('pages.services');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/documents','PagesController@documents')->name('documents.index');

Route::get('/noticias-y-eventos/{slug}','PagesController@blog_detail')->name('blog_detail');
Route::post('/contact','MailsController@send')->name('contact.mail');

//ADMIN
Route::group(['middleware' => ['auth', 'admin']], function() {
  Route::get('/gt_admin', function(){
    return view('admin');
  })->name('gt_admin');
});

Route::group(['prefix' => 'gt_admin', 'middleware' => ['auth', 'admin']], function() {
  Route::resource('members', 'Admin\MembersController');
  Route::resource('principal_slider', 'Admin\PrincipalSlidersController');
  Route::resource('promotions', 'Admin\PromotionsController');
  Route::resource('courses', 'Admin\CoursesController');
  Route::resource('documents', 'Admin\DocumentsController');
  Route::resource('users', 'Admin\UsersController');
  Route::resource('about_sliders', 'Admin\AboutSlidersController');
  Route::resource('blogs', 'Admin\BlogsController');
});
