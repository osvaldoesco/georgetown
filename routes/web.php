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

Route::get('/horarios', 'PagesController@schedules')->name('pages.schedules');

Route::get('/cursos','PagesController@courses')->name('pages.courses');

Route::get('/contacto', 'PagesController@contact')->name('pages.contact');

Route::get('/quienes-somos', 'PagesController@about_us')->name('pages.about_us');
Route::get('/metodologia', 'PagesController@methodology')->name('pages.methodology');

Route::get('/productos/{id}','PagesController@product')->name('pages.product');


Route::get('/gt_login', function(){
  return view('site.pages.login');
})->name('pages.gt_login');

Route::get('/eventos-y-noticias', 'PagesController@events')->name('pages.events');
Route::get('/tienda', 'PagesController@store')->name('pages.store');
Route::get('/eventos-y-noticias/{slug}','PagesController@showBlog')->name('pages.blog_detail');
Route::get('/cursos/{id}','PagesController@course_detail')->name('pages.course_detail');

Route::get('/servicios', function () {
  return view('site.services');
})->name('pages.services');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/documents','PagesController@documents')->name('documents.index');
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
  Route::resource('schedules', 'Admin\SchedulesController');
  Route::resource('products', 'Admin\ProductsController');
  Route::get('/users/{id}/change_password', 'Admin\UsersController@newPassword')->name('users.new_password');
  Route::post('/users/{id}/change_password', 'Admin\UsersController@updatePassword')->name('users.update_password');  
});
