<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\SpeakerController;
use App\Http\Controllers\SponsorController;

// Routes accessibles à tous (login, inscription, etc.)
require __DIR__.'/auth.php';

// Toutes les autres routes nécessitent une connexion
Route::middleware('auth')->group(function () {
    Route::get('/home', [EventController::class, 'index'])->name('home');
    Route::resource('events', EventController::class);
    Route::resource('places', PlaceController::class);
    Route::resource('participants', ParticipantController::class);
    Route::resource('speakers', SpeakerController::class);
    Route::resource('sponsors', SponsorController::class);
});