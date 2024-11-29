<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoreCityController;
use App\Http\Controllers\AcctCreditController;
use App\Http\Controllers\CoreBranchController;
use App\Http\Controllers\CoreMemberController;
use App\Http\Controllers\CoreOfficeController;
use App\Http\Controllers\AcctAccountController;
use App\Http\Controllers\AcctSavingsController;
use App\Http\Controllers\AcctDepositoController;
use App\Http\Controllers\AcctMutationController;
use App\Http\Controllers\CoreProvinceController;
use App\Http\Controllers\SystemUserGroupController;
use App\Http\Controllers\LocationController;

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

Route::prefix('acct_credit')->name('acct_credit.')->group(function () {
    Route::get('/', [AcctCreditController::class, 'index'])->name('index');
    Route::get('add', [AcctCreditController::class, 'create'])->name('create');
    Route::post('add', [AcctCreditController::class, 'store'])->name('store');
    Route::get('edit{id}', [AcctCreditController::class, 'update'])->name('update');
    Route::post('prosesedit{id}', [AcctCreditController::class, 'prosesupdate'])->name('prosesupdate');
    Route::post('delete{id}', [AcctCreditController::class, 'delete'])->name('delete');
});

Route::prefix('AcctSavings')->name('AcctSavings.')->group(function () {
    Route::get('/', [AcctSavingsController::class, 'index'])->name('index');
    Route::get('add', [AcctSavingsController::class, 'create'])->name('create');
    Route::post('add', [AcctSavingsController::class, 'store'])->name('store');
    Route::get('edit{id}', [AcctSavingsController::class, 'update'])->name('update');
    Route::put('prosesedit{id}', [AcctSavingsController::class, 'prosesupdate'])->name('prosesupdate');
    Route::post('delete{id}', [AcctSavingsController::class, 'delete'])->name('delete');
});
Route::prefix('AcctDeposito')->name('AcctDeposito.')->group(function () {
    Route::get('/', [AcctDepositoController::class, 'index'])->name('index');
    Route::get('add', [AcctDepositoController::class, 'create'])->name('create');
    Route::post('add', [AcctDepositoController::class, 'store'])->name('store');
    Route::get('edit{id}', [AcctDepositoController::class, 'update'])->name('update');
    Route::put('prosesedit{id}', [AcctDepositoController::class, 'prosesupdate'])->name('prosesupdate');
    Route::post('delete{id}', [AcctDepositoController::class, 'delete'])->name('delete');
});
Route::prefix('acct_account')->name('acct_account.')->group(function () {
    Route::get('/', [AcctAccountController::class, 'index'])->name('index');
    Route::get('add', [AcctAccountController::class, 'create'])->name('create');
    Route::post('add', [AcctAccountController::class, 'store'])->name('store');
    Route::get('edit{id}', [AcctAccountController::class, 'update'])->name('update');
    Route::post('prosesedit{id}', [AcctAccountController::class, 'prosesupdate'])->name('prosesupdate');
    Route::post('delete{id}', [AcctAccountController::class, 'delete'])->name('delete');
});
Route::prefix('CoreCity')->name('CoreCity.')->group(function () {
    Route::get('/', [CoreCityController::class, 'index'])->name('index');
    Route::get('add', [CoreCityController::class, 'create'])->name('create');
    Route::post('add', [CoreCityController::class, 'store'])->name('store');
    Route::get('edit{id}', [CoreCityController::class, 'update'])->name('update');
    Route::put('prosesedit{id}', [CoreCityController::class, 'prosesupdate'])->name('prosesupdate');
    Route::post('delete{id}', [CoreCityController::class, 'delete'])->name('delete');
});
Route::prefix('core_province')->name('core_province.')->group(function () {
    Route::get('/', [CoreProvinceController::class, 'index'])->name('index');
    Route::get('add', [CoreProvinceController::class, 'create'])->name('create');
    Route::post('add', [CoreProvinceController::class, 'store'])->name('store');
    Route::get('edit{id}', [CoreProvinceController::class, 'update'])->name('update');
    Route::put('prosesedit{id}', [CoreProvinceController::class, 'prosesupdate'])->name('prosesupdate');
    Route::post('delete{id}', [CoreProvinceController::class, 'delete'])->name('delete');
});
Route::prefix('core_office')->name('core_office.')->group(function () {
    Route::get('/', [CoreOfficeController::class, 'index'])->name('index');
    Route::get('add', [CoreOfficeController::class, 'create'])->name('create');
    Route::post('add', [CoreOfficeController::class, 'store'])->name('store');
    Route::get('edit{id}', [CoreOfficeController::class, 'update'])->name('update');
    Route::post('prosesedit{id}', [CoreOfficeController::class, 'prosesupdate'])->name('prosesupdate');
    Route::post('delete{id}', [CoreOfficeController::class, 'delete'])->name('delete');
});
Route::prefix('core_member')->name('core_member.')->group(function () {
    Route::get('/', [CoreMemberController::class, 'index'])->name('index');
    Route::get('add', [CoreMemberController::class, 'create'])->name('create');
    Route::post('add', [CoreMemberController::class, 'store'])->name('store');
    Route::get('edit{id}', [CoreMemberController::class, 'update'])->name('update');
    Route::post('prosesedit{id}', [CoreMemberController::class, 'prosesupdate'])->name('prosesupdate');
    Route::post('delete{id}', [CoreMemberController::class, 'delete'])->name('delete');
    Route::get('getMasterDataCoreMember', [CoreMemberController::class, 'getMasterDataCoreMember'])
    ->name('core_member.getMasterDataCoreMember.index');
    Route::get('CoreMemberSavings', [CoreMemberController::class, 'CoreMemberSavings'])
    ->name('core_member.CoreMemberSavings.index');
});
Route::prefix('core_member_status')->name('core_member_status.')->group(function () {
    Route::get('/', [CoreMemberController::class, 'index_update'])->name('index_update');
    Route::post('update_status{id}', [CoreMemberController::class, 'update_status'])->name('update_status');
});
Route::prefix('acct_mutation')->name('acct_mutation.')->group(function () {
    Route::get('/', [AcctMutationController::class, 'index'])->name('index');
    Route::get('add', [AcctMutationController::class, 'create'])->name('create');
    Route::post('add', [AcctMutationController::class, 'store'])->name('store');
    Route::get('edit{id}', [AcctMutationController::class, 'update'])->name('update');
    Route::put('prosesedit{id}', [AcctMutationController::class, 'prosesupdate'])->name('prosesupdate');
    Route::post('delete{id}', [AcctMutationController::class, 'delete'])->name('delete');
});
Route::get('/get-cities/{provinceId}', [LocationController::class, 'getCities']);
Route::get('/get-kecamatans/{cityId}', [LocationController::class, 'getKecamatans']);
Route::get('/get-kelurahans/{kecamatanId}', [LocationController::class, 'getKelurahans']);
Route::get('/get-dusuns/{kelurahanId}', [LocationController::class, 'getDusuns']);
Route::get('/api/members', [CoreMemberController::class, 'getMembers']);
