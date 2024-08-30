<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Rotas de produtos
Route::get('/produtos', [ProdutoController::class, 'index'])->name('produtos.index');
Route::post('/produtos', [ProdutoController::class, 'store'])->name('produtos.store');
Route::delete('/produtos/{id}', [ProdutoController::class, 'destroy'])->name('produtos.destroy');
Route::put('/produtos/{id}', [ProdutoController::class, 'update'])->name('produtos.update');
Route::post('/produtos/filter', [ProdutoController::class, 'filterProducts'])->name('produtos.filter');


Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes.index');
Route::post('/clientes', [ClienteController::class, 'store'])->name('clientes.store');
Route::delete('/clientes/{id}', [ClienteController::class, 'destroy'])->name('clientes.destroy');
Route::put('/clientes/{id}', [ClienteController::class, 'update'])->name('clientes.update');

Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias.index');
Route::post('/categorias', [CategoriaController::class, 'store'])->name('categorias.store');
Route::put('/categorias/{id}', [CategoriaController::class, 'update'])->name('categorias.update');
Route::delete('/categorias/{id}', [CategoriaController::class, 'destroy'])->name('categorias.destroy');
