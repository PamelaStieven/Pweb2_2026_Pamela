<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunoController;

Route::get('/', function () {
    return view('main');
});

/*

Route::get('/aluno', function () {
    // return "<h3>Olá Mundo! Olá Laravel Também.</h3>";
    return view('aluno.list'); // -> A View é a parte que o usuário vê e interage.
});

*/

Route::get('/aluno', [AlunoController::class, 'index']);
Route::get('/aluno/create', [AlunoController::class, 'create']);
Route::post('/aluno/store', [AlunoController::class, 'store',])->name('aluno.store');
