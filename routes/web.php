<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;

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


Route::get('/', 'PagesController@index'); //use this syntax only if you uncomment $namespace at RouteServiceProvider
Route::get('/about', [PagesController::class, 'about']);
Route::get('/features', [PagesController::class, 'features']);
Route::resource('posts' , 'PostsController');

Route::get('/media', 'MediaController@index');
Route::get('/media/upload', 'MediaController@create');  
Route::post('/media', 'MediaController@store');
Route::delete('/media/{id}', 'MediaController@destroy');
Route::get('/media/{id}', 'MediaController@show');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
