<?php

use App\Http\Controllers\PostController;
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
Route::resource('posts', 'PostController');

Route::prefix('admin')->name("admin.")->group(function(){
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/posts', 'HomeController@posts')->name('posts');
    Route::get('/posts/{post}/edit', 'HomeController@edit')->name('edit');
    Route::put('/posts/{post}', 'HomeController@update')->name('update');
    Route::delete('/posts/{post?}', 'HomeController@destroy')->name('destroy');
    Route::get('/account', 'HomeController@account')->name('account');
    Route::post('/account', 'HomeController@accountUpdate')->name('account_update');
});
