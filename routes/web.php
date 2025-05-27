<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\SpeakerController;
use App\Http\Controllers\SponsorController;

Route::resource('events', EventController::class)->middleware('auth');
// Page d'accueil, par exemple liste des événements
Route::get('/home', [EventController::class, 'index'])->name('home');

// Routes RESTful pour chaque ressource
Route::resource('events', EventController::class);
Route::resource('places', PlaceController::class);
Route::resource('participants', ParticipantController::class);
Route::resource('speakers', SpeakerController::class);
Route::resource('sponsors', SponsorController::class);

require __DIR__.'/auth.php';