<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\BicicletaControler;
use App\Http\Controllers\AcessoriosController;

Route::get('/', function () {
    return view('main');
});

Route::get('/acessorios', [AcessoriosController::class, 'index']);
Route::get('/acessorios/create', [AcessoriosController::class, 'create']);
Route::post(
    '/acessorios/store',
    [AcessoriosController::class, 'store']
)->name('acessorios.store');

Route::get('/acessorios/edit/{id}',
    [AcessoriosController::class, 'edit'])->name('acessorios.edit');
Route::put(
    '/acessorios/update/{id}',
    [AcessoriosController::class, 'update']
)->name('acessorios.update');

Route::delete(
    '/acessorios/{id}',
    [AcessoriosController::class, 'destroy']
)->name('acessorios.destroy');

Route::post(
    '/acessorios/search',
    [AcessoriosController::class, 'search']
)->name('acessorios.search');


Route::get('/bicicleta', [BicicletaController::class, 'index']);
Route::get('/bicicleta/create', [BicicletaController::class, 'create']);
Route::post(
    '/bicicleta/store',
    [BicicletaController::class, 'store']
)->name('bicicleta.store');

Route::get('/bicicleta/edit/{id}',
    [BicicletaController::class, 'edit'])->name('bicicleta.edit');
Route::put(
    '/bicicleta/update/{id}',
    [BicicletaController::class, 'update']
)->name('bicicleta.update');

Route::delete(
    '/bicicleta/{id}',
    [BicicletaController::class, 'destroy']
)->name('bicicleta.destroy');

Route::post(
    '/bicicleta/search',
    [BicicletaController::class, 'search']
)->name('bicicleta.search');


Route::get('/Cliente', [ClienteController::class, 'index']);
Route::get('/cliente/create', [ClienteController::class, 'create']);
Route::post(
    '/cliente/store',
    [ClienteController::class, 'store']
)->name('cliente.store');

Route::get('/cliente/edit/{id}',
    [ClienteController::class, 'edit'])->name('cliente.edit');
Route::put(
    '/cliente/update/{id}',
    [ClienteController::class, 'update']
)->name('cliente.update');

Route::delete(
    '/cliente/{id}',
    [ClienteController::class, 'destroy']
)->name('cliente.destroy');

Route::post(
    '/cliente/search',
    [ClienteController::class, 'search']
)->name('cliente.search');
