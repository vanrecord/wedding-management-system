<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserInfoController;

Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);
Route::get('/', function () {
    return view('home');
});
Route::resource('/userinfo', UserInfoController::class);
// Auth::routes();
Auth::routes(['register' => false]);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
