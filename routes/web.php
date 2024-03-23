<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;

Route::get('/', [TicketController::class, 'index'])->name('home');

Route::get('/create', [TicketController::class, 'create'])->name('ticket.create');
Route::post('/create', [TicketController::class, 'store']);

Route::get('/show/{slug}', [TicketController::class, 'show'])->name('ticket.show');

Route::get('/show/{slug}/edit', [TicketController::class, 'edit'])->name('ticket.edit');
Route::post('/show/{slug}/edit', [TicketController::class, 'update']);

Route::post('/ticket/{slug}/delete', [TicketController::class, 'destroy'])->name('ticket.delete');