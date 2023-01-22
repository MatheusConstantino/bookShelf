<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BooksController;

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');

});

Route::controller(BooksController::class)->group(function () {
    Route::get('books', 'index');
    Route::post('book', 'store');
    Route::get('book/{id}', 'show');
    Route::put('book/{id}', 'update');
    Route::delete('book/{id}', 'destroy');
});
