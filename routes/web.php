<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserInfoController;

Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);
Route::get('/', function () {
    return view('welcome');
});
Route::resource('/userinfo', UserInfoController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
