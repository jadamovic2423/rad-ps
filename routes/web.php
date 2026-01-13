<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccessController;
use App\Http\Controllers\KlijentController;

Route::get('/', function () {
    return view('tickets.access'); // početna stranica
})->name('access');


Route::post('/access/login', [AccessController::class, 'login'])->name('access.login');

Route::get('/client/dashboard', function () {
    return view('tickets.dashboard');
})->name('client.dashboard');


Route::get('/client/ticket/create', [KlijentController::class, 'create'])
    ->name('client.ticket.create');

Route::get('/client/ticket/list', [KlijentController::class, 'index'])
    ->name('client.ticket.list');




require __DIR__.'/auth.php';
