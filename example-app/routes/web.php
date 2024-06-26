<?php


use Illuminate\Support\Facades\Route;

Route::get('/',[\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/users',[\App\Http\Controllers\UserController::class, 'index'])->name('users.index');
Route::get('/users/create',[\App\Http\Controllers\UserController::class, 'create'])->name('users.create');
Route::post('/users',[\App\Http\Controllers\UserController::class, 'store'])->name('users.store');
Route::get('/users/{user}',[\App\Http\Controllers\UserController::class, 'show'])->name('users.show');
Route::get('/users/{user}/edit',[\App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}',[\App\Http\Controllers\UserController::class, 'update'])->name('users.update');
Route::delete('/users/{user}',[\App\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy');
