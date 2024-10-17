<?php

use App\Http\Controllers\SystemUserGroupController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::resource('system-user-group',SystemUserGroupController::class)->name('system-user-group');
// Route::resource('system-user-group',SystemUserGroupController::class)->name('add','system-user-group.add');

Route::prefix('system-user-group')->name('system-user-group.')->group(function () {
    Route::get('/', [SystemUserGroupController::class, 'index'])->name('index');
    Route::get('add', [SystemUserGroupController::class, 'create'])->name('create');
    Route::post('add', [SystemUserGroupController::class, 'store'])->name('store');
    Route::get('edit{id}', [SystemUserGroupController::class, 'update'])->name('update');
    Route::post('prosesedit{id}', [SystemUserGroupController::class, 'prosesupdate'])->name('prosesupdate');
    Route::post('delete{id}', [SystemUserGroupController::class, 'delete'])->name('delete');
});