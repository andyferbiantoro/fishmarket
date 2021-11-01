<?php

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
    return view('login');
})->name('login')->middleware('guest');


Route::get('/register', function () {
    return view('register');
})->name('register')->middleware('guest');


//proses register
Route::post('proses-register', 'AuthController@proses_register')->name('proses-register')->middleware('guest');


//proses login
Route::post('proses-login','AuthController@proses_login')->name('proses-login')->middleware('guest');


Route::group(['middleware' => ['auth', 'admin']],function(){
    Route::get('/admin-dashboard', 'AdminController@index')->name('admin-dashboard');
    Route::get('/admin-kelola_seafood', 'AdminController@kelola_seafood')->name('admin-kelola_seafood'); 
    Route::post('/admin-kelola_seafood_add', 'AdminController@kelola_seafood_add')->name('admin-kelola_seafood_add'); 
    
});


Route::get('logout-admin', 'AuthController@logout')->name('logout-admin')->middleware(['admin', 'auth']);