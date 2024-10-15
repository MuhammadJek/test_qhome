<?php

use App\Http\Controllers\Api\DateController;
use App\Http\Controllers\Api\FilmController;
use App\Http\Controllers\Api\LuasController;
use App\Http\Controllers\Api\NameController;
use App\Http\Controllers\Api\PesanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//List film
Route::get('/film', [FilmController::class, 'index']);

//Film with genre
Route::get('/film/{genre}', [FilmController::class, 'getFilm']);

//Rumus Luas
Route::post('/luas', [LuasController::class, 'luas']);
//Pesan
Route::post('/pesan', [PesanController::class, 'store']);
//Waktu sekarang
Route::get('/date', [DateController::class, 'now']);


Route::get('/hello', [NameController::class, 'name']);
