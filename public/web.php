<?php

use App\Http\Controllers\Dossier\DossierController;
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
    return view('auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function()
{
    Route::resource('users', 'UsersController');
});
Route::namespace('Dossier')->prefix('dossier')->group(function(){
    Route::resource('dossiers', 'DossierController');
});
Route::namespace('Type')->prefix('type')->group(function(){
    Route::resource('type','TypesController');
});
Route::namespace('Genre')->prefix('genre')->group(function(){
    Route::resource('genre','GenresController');
});

Route::get('/download{file}', 'DownController@download')->name('download');

Route::get('/search','SearchController@search')->name('search');









