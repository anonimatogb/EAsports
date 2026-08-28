<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/modalities', [App\Http\Controllers\ModalityController::class, 'index']);
Route::get('/localities', [App\Http\Controllers\LocalityController::class, 'index']);
Route::get('/coachs', [App\Http\Controllers\CoachController::class, 'index']);
Route::get('/competitors', [App\Http\Controllers\CompetitorController::class, 'index']);
Route::get('/rankings', [App\Http\Controllers\RankingController::class, 'index']);
