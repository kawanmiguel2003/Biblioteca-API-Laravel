<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\EmprestimoController;
use App\Http\Controllers\MultaController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Rota para login e registro de usuário
Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

// Rotas de Categoria
Route::get('/categorias', [CategoriaController::class, 'index']);
Route::post('/categorias', [CategoriaController::class, 'store']);
Route::put('/categorias/{id}', [CategoriaController::class, 'update']);
Route::delete('/categorias/{id}', [CategoriaController::class, 'destroy']);

// Rotas de Livro
Route::get('/livros', [LivroController::class, 'index']);
Route::post('/livros', [LivroController::class, 'store']);
Route::put('/livros/{id}', [LivroController::class, 'update']);
Route::delete('/livros/{id}', [LivroController::class, 'destroy']);

// Rotas de Usuário
Route::get('/usuarios', [UsuarioController::class, 'index']);
Route::post('/usuarios', [UsuarioController::class, 'store']);
Route::put('/usuarios/{id}', [UsuarioController::class, 'update']);
Route::delete('/usuarios/{id}', [UsuarioController::class, 'destroy']);

// Rotas de Emprestimo
Route::get('/emprestimos', [EmprestimoController::class, 'index']);
Route::post('/emprestimos', [EmprestimoController::class, 'store']);
Route::put('/emprestimos/{id}', [EmprestimoController::class, 'update']);
Route::delete('/emprestimos/{id}', [EmprestimoController::class, 'destroy']);

// Rotas de Multa
Route::get('/multas', [MultaController::class, 'index']);
Route::post('/multas', [MultaController::class, 'store']);
Route::put('/multas/{id}', [MultaController::class, 'update']);
Route::delete('/multas/{id}', [MultaController::class, 'destroy']);