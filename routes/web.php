<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserInfoController;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('/userinfo', UserInfoController::class);
