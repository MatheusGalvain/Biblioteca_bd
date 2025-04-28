<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LeitorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EditorController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\EmprestimoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix('/')->group(function() {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboards-index');
});

Route::prefix('/leitores')->group(function() {
    Route::get('/', [LeitorController::class, 'index'])->name('leitores-index');
    Route::get('/create', [LeitorController::class, 'create'])->name('leitores-create');
    Route::post('/', [LeitorController::class, 'store'])->name('leitores-store');
    Route::get('/{id}edit', [LeitorController::class, 'edit'])->where('id', '[0-9]+')->name('leitores-edit');
    Route::put('/{id}', [LeitorController::class, 'update'])->where('id', '[0-9]+')->name('leitores-update');
    Route::delete('/{id}', [LeitorController::class, 'destroy'])->where('id', '[0-9]+')->name('leitores-destroy');
});

Route::prefix('/usuarios')->group(function() {
    Route::get('/', [UserController::class, 'index'])->name('usuarios-index');
    Route::get('/create', [UserController::class, 'create'])->name('usuarios-create');
    Route::post('/', [UserController::class, 'store'])->name('usuarios-store');
    Route::get('/{id}edit', [UserController::class, 'edit'])->where('id', '[0-9]+')->name('usuarios-edit');
    Route::put('/{id}', [UserController::class, 'update'])->where('id', '[0-9]+')->name('usuarios-update');
    Route::delete('/{id}', [UserController::class, 'destroy'])->where('id', '[0-9]+')->name('usuarios-destroy');
});

Route::prefix('/editores')->group(function() {
    Route::get('/', [EditorController::class, 'index'])->name('editores-index');
    Route::get('/create', [EditorController::class, 'create'])->name('editores-create');
    Route::post('/', [EditorController::class, 'store'])->name('editores-store');
    Route::get('/{id}edit', [EditorController::class, 'edit'])->name('editores-edit');
    Route::put('/{id}', [EditorController::class, 'update'])->where('id', '[0-9]+')->name('editores-update');
    Route::delete('/{id}', [EditorController::class, 'destroy'])->where('id', '[0-9]+')->name('editores-destroy');
});

Route::prefix('/generos')->group(function() {
    Route::get('/', [GeneroController::class, 'index'])->name('generos-index');
    Route::get('/create', [GeneroController::class, 'create'])->name('generos-create');
    Route::post('/', [GeneroController::class, 'store'])->name('generos-store');
    Route::get('/{id}edit', [GeneroController::class, 'edit'])->where('id', '[0-9]+')->name('generos-edit');
    Route::put('/{id}', [GeneroController::class, 'update'])->where('id', '[0-9]+')->name('generos-update');
    Route::delete('/{id}', [GeneroController::class, 'destroy'])->where('id', '[0-9]+')->name('generos-destroy');
});

Route::prefix('/livros')->group(function() {
    Route::get('/', [LivroController::class, 'index'])->name('livros-index');
    Route::get('/create', [LivroController::class, 'create'])->name('livros-create');
    Route::post('/', [LivroController::class, 'store'])->name('livros-store');
    Route::get('/{id}edit', [LivroController::class, 'edit'])->where('id', '[0-9]+')->name('livros-edit');
    Route::put('/{id}', [LivroController::class, 'update'])->where('id', '[0-9]+')->name('livros-update');
    Route::delete('/{id}', [LivroController::class, 'destroy'])->where('id', '[0-9]+')->name('livros-destroy');
});

Route::prefix('/emprestimos')->group(function() {
    Route::get('/', [EmprestimoController::class, 'index'])->name('emprestimos-index');
    Route::get('/create', [EmprestimoController::class, 'create'])->name('emprestimos-create');
    Route::post('/', [EmprestimoController::class, 'store'])->name('emprestimos-store');
    Route::get('/{id}/edit', [EmprestimoController::class, 'edit'])->where('id', '[0-9]+')->name('emprestimos-edit');
    Route::put('/{id}', [EmprestimoController::class, 'update'])->where('id', '[0-9]+')->name('emprestimos-update');
    Route::delete('/{id}', [EmprestimoController::class, 'destroy'])->where('id', '[0-9]+')->name('emprestimos-destroy');

    Route::get('/pdf', [EmprestimoController::class, 'gerarPDF'])->name('emprestimos-pdf');
});

Route::get('/emprestimos/relatorio', [EmprestimoController::class, 'relatorioView'])->name('emprestimos-relatorio');

Route::get('/leitor/{id}/total-emprestimos', [EmprestimoController::class, 'totalEmprestimosPorLeitor']);

Route::get('/livros_cadastrados', [LivroController::class, 'livrosCadastrados'])->name('livros-cadastrados');

