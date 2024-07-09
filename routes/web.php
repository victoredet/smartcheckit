<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('home.index');
});

//auth
Route::get('/sign-up', [UserController::class, 'registerH']);
Route::post('/register', [UserController::class, 'register']);
Route::post('/logout', [UserController::class, 'logout']);




Route::get('/create-organization', [OrganizationController::class, 'createOrganizationH']);

Route::prefix('organization')->group(function () {
    Route::get('/create', [OrganizationController::class, 'createOrganizationH'])->name('organization.createH');
    Route::pott('/create', [OrganizationController::class, 'createOrganization'])->name('organization.create');
});
