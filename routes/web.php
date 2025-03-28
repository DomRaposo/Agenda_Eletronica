<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AtividadeController;
use App\Http\Controllers\Auth\RegisterController;

Route::middleware(['auth'])->group(function () {
    Route::resource('/atividades', AtividadeController::class);
    Route::post('/atividades', [AtividadeController::class, 'store'])->name('atividades.store');
});




Auth::routes();
