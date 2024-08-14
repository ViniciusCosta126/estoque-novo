<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('/produtos', ProdutoController::class)->except(['edit', 'show']);
Route::resource('/clientes', ClienteController::class)->except(['edit', 'show']);
