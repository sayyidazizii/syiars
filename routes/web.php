<?php

use App\Http\Controllers\SystemUserGroupController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoreBranchController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::resource('system-user-group',SystemUserGroupController::class)->name('system-user-group');

Route::resource('system-user-group',SystemUserGroupController::class)->name('add','system-user-group.add');

Route::prefix('core_branch')->name('core_branch.')->group(function () {
    Route::get('/', [CoreBranchController::class, 'index'])->name('index');
    Route::get('add', [CoreBranchController::class, 'create'])->name('add');
    Route::post('add', [CoreBranchController::class, 'submit'])->name('submit');
    Route::get('edit{id}', [CoreBranchController::class, 'update'])->name('update');
    Route::post('prosesedit{id}', [CoreBranchController::class, 'prosesupdate'])->name('prosesupdate');
    Route::post('delete{id}', [CoreBranchController::class, 'delete'])->name('delete');
});

