<?php

use App\Http\Controllers\Api\MediaController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/media', [MediaController::class, 'index']);
Route::post('/media', [MediaController::class, 'store']);

Route::get('/media/{media}', [MediaController::class, 'show']);
Route::put('/media/{media}', [MediaController::class, 'update']);
Route::patch('/media/{media}', [MediaController::class, 'update']);
Route::delete('/media/{media}', [MediaController::class, 'destroy']);

Route::post(
    '/users/{user}/collection/{media}',
    [MediaController::class, 'addToCollection']
);

Route::delete(
    '/users/{user}/collection/{media}',
    [MediaController::class, 'removeFromCollection']
);

Route::get(
    '/users/{user}/collection',
    [UserController::class, 'showCollection']
);
