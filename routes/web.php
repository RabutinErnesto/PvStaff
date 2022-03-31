<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function()
{
    Route::resource('users', 'UsersController');
});

Route::get('direction','DirectionController@create')->name('direction');
Route::post('/ajoutdir','DirectionController@store')->name('ajoutdir');

Route::get('/contact', 'ContactController@index')->name('contact');

Route::get('listedir', 'DirectionController@index')->name('listedir');

Route::get('/service', 'ServiceController@index')->name('service');

Route::post('service/create', 'ServiceController@store');

Route::namespace('theme')->prefix('theme')->group(function(){
    Route::resource('themes', 'ThemeController');


});

Route::namespace('discussion')->prefix('discussion')->group(function(){

    Route::resource('discussion', 'DiscussionController');
});

Route::namespace('conclusion')->prefix('conclusion')->group(function(){
    Route::resource('conclusion', 'ConclusionController');
});

Route::namespace('intervenant')->prefix('intervenant')->group(function(){
    Route::resource('intervenant', 'IntervenantController');
});

Route::namespace('Autre')->prefix('autre')->group(function(){
    Route::resource('autreintervenant', 'AutreintervenantController');
});


Route::get('/search/', 'HomeController@search')->name('search');








