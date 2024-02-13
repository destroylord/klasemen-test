<?php

use App\Http\Controllers\ClubController;
use App\Http\Controllers\ClubScoreController;
use Illuminate\Support\Facades\Route;


Route::get('/', [ClubScoreController::class, 'index'])->name('club-scores.index');


Route::get('/club', [ClubController::class, 'index'])->name('club.index');
Route::post('/club-store', [ClubController::class, 'store'])->name('club.store');

Route::get('/club-scores', [ClubScoreController::class, 'create'])->name('club-scores.create');
Route::post('/club-scores', [ClubScoreController::class, 'store'])->name('club-scores.store');

