<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\EventsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/events/register', [UserController::class, 'register'])->name('events.register');
Route::post('/events/register', [UserController::class, 'registerCreate'])->name('events.registerCreate');
Route::get('/events/login', [UserController::class, 'login'])->name('events.login');
Route::post('/events/login', [UserController::class, 'loginEvents'])->name('events.loginEvents');
Route::post('/events/logout', [UserController::class, 'logoutEvents'])->name('events.logoutEvents');

Route::get('/events/user', [EventsController::class, 'indexUser'])->name('events.indexUser');
Route::get('/events', [EventsController::class, 'index'])->name('events.index');
Route::get('/events/create', [EventsController::class, 'create'])->name('events.create');
Route::post('/events/store', [EventsController::class, 'store'])->name('events.store');

Route::get('/events/{event}/edit', [EventsController::class, 'edit'])->name('events.edit');
Route::put('/events/{event}', [EventsController::class, 'update'])->name('events.update');
Route::get('/events/{event}',[EventsController::class, 'show'])->name('events.show');
Route::delete('/events/{event}', [EventsController::class, 'destroy'])-> name('events.destroy');
