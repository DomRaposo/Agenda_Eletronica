<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AtividadeController;

Route::middleware(['auth'])->group(function () {
    Route::resource('/atividades', AtividadeController::class);
});


Auth::routes();
