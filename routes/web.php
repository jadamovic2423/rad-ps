<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccessController;
use App\Http\Controllers\KlijentController;
use App\Http\Controllers\ProductSpecialistController;
use App\Http\Controllers\ZahtevController;
use App\Http\Controllers\ObradaZahtevaController;

/**
 * HiFi ekran 1 – Pristup tiketing sistemu
 */
Route::get('/', function () {
    return view('tickets.access'); // početna stranica
})->name('access');

Route::post('/access/login', [AccessController::class, 'login'])->name('access.login');


/**
 * HiFi ekran 2 – Početni ekran (klijent)
 * 
 */
Route::get('/client/ticket/list', [KlijentController::class, 'index'])
    ->name('client.ticket.list');

Route::get('/client/dashboard', function () {
    return view('tickets.client_home');
})->name('client.dashboard');

Route::post('/logout', [AccessController::class, 'logout'])->name('logout');


/**
 * HiFi ekran 3 – Novi zahtev forma
 */
Route::get('/client/ticket/create', [KlijentController::class, 'create'])->name('client.ticket.create');
Route::post('/client/ticket/store', [KlijentController::class, 'store'])->name('client.ticket.store');


/**
 * HiFi ekran 3A – Obaveštenje
 */
Route::get('/client/ticket/alert', function () {
    return view('tickets.create_ticket_alert');
})->name('client.ticket.alert');


/**
 * HiFi ekran 3B – Novi zahtev sa fajlom
 */
Route::get('/client/ticket/add', function () {
    return view('tickets.create_add');
})->name('client.ticket.add');

Route::post('/tickets/store', [KlijentController::class, 'store'])->name('tickets.store');


/**
 * HiFi ekran 4 – Uspešno kreiran zahtev
 */
Route::get('/client/ticket/success/{ticketId}', function ($ticketId) {
    return view('tickets.success', compact('ticketId'));
})->name('client.ticket.success');


/**
 * HiFi ekran 5 – Početni ekran (Product specialist)
 */
Route::get('/product/dashboard', function () {
    return view('tickets.product_specialist_home');
})->name('product.dashboard');

// Pregled liste svih zahteva (link u Blade-u: route('tickets.new_tickets'))
Route::get('/tickets/list', [ProductSpecialistController::class, 'list'])
    ->name('tickets.new_tickets');

// Pregled zahteva u statusu "Novi" (link u Blade-u: route('tickets.delegate_ticket'))
Route::get('/tickets/new', [ProductSpecialistController::class, 'newTickets'])
    ->name('tickets.delegate_ticket');

// Logout (pošto ga koristiš u formi na vrhu Blade-a)
Route::post('/logout', [AccessController::class, 'logout'])
    ->name('logout');



Route::get('/tickets/{id}', [ProductSpecialistController::class, 'show'])
    ->name('tickets.show');


Route::get('/client/ticket/list', [KlijentController::class, 'list'])
    ->name('client.ticket.list');
