<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoreBranchController;
use App\Http\Controllers\AcctDepositoController;
use App\Http\Controllers\SystemUserGroupController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('system-user-group')->name('system-user-group.')->group(function () {
    Route::get('/', [SystemUserGroupController::class, 'index'])->name('index');
    Route::get('add', [SystemUserGroupController::class, 'create'])->name('create');
    Route::post('add', [SystemUserGroupController::class, 'store'])->name('store');
    Route::get('edit{id}', [SystemUserGroupController::class, 'update'])->name('update');
    Route::post('prosesedit{id}', [SystemUserGroupController::class, 'prosesupdate'])->name('prosesupdate');
    Route::post('delete{id}', [SystemUserGroupController::class, 'delete'])->name('delete');
});
Route::prefix('core_branch')->name('core_branch.')->group(function () {
    Route::get('/', [CoreBranchController::class, 'index'])->name('index');
    Route::get('add', [CoreBranchController::class, 'create'])->name('create');
    Route::post('add', [CoreBranchController::class, 'store'])->name('store');
    Route::get('edit{id}', [CoreBranchController::class, 'update'])->name('update');
    Route::post('prosesedit{id}', [CoreBranchController::class, 'prosesupdate'])->name('prosesupdate');
    Route::post('delete{id}', [CoreBranchController::class, 'delete'])->name('delete');
});
Route::prefix('AcctDeposito')->name('AcctDeposito.')->group(function () {
    Route::get('/', [AcctDepositoController::class, 'index'])->name('index');
    Route::get('add', [AcctDepositoController::class, 'create'])->name('create');
    Route::post('add', [AcctDepositoController::class, 'store'])->name('store');
    Route::get('edit{id}', [AcctDepositoController::class, 'update'])->name('update');
    Route::put('prosesedit{id}', [AcctDepositoController::class, 'prosesupdate'])->name('prosesupdate');
    Route::post('delete{id}', [AcctDepositoController::class, 'delete'])->name('delete');
});
