<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dash'])->name('dashboard');

Route::group(['middleware' =>'auth'],function (){

    Route::resource('songwriters' ,\App\Http\Controllers\SongwriterController::class);
    Route::resource('singers' ,\App\Http\Controllers\SingerController::class);
    Route::resource('producers' ,\App\Http\Controllers\ProducerController::class);
    Route::resource('composers' ,\App\Http\Controllers\ComposerController::class);
    Route::resource('songs' ,\App\Http\Controllers\SongController::class);
    Route::resource('users' ,\App\Http\Controllers\UserController::class);

});

