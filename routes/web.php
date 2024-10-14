<?php

use App\Http\Controllers\SystemUserGroupController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::resource('system-user-group',SystemUserGroupController::class)->name('system-user-group');
