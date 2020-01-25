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



Route::get('/', 'PagesController@index');

Route::resource('personnal','PersonnalController');  
Route::resource('professional','ProfessionalController');
Route::resource('business','BusinessController');  
Route::resource('address','AddressController');  




Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home');
