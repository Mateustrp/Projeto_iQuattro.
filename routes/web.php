<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProdutoController;

Route::get('/', function () {
    return view('welcome');
});

// Rotas Clientes
Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes.index');
Route::get('/clientes/incluir', [ClienteController::class, 'create'])->name('clientes.incluir');
Route::post('/clientes', [ClienteController::class, 'store'])->name('clientes.store');
Route::get('/clientes/{cliente}', [ClienteController::class, 'show'])->name('clientes.vizualiza'); 
Route::get('/clientes/{codigo}/editar', [ClienteController::class, 'editar'])->name('clientes.editar');
Route::put('/clientes/{codigo}', [ClienteController::class, 'update'])->name('clientes.update');
Route::delete('/clientes/{cliente}', [ClienteController::class, 'destroy'])->name('clientes.delete'); 

// Rotas Produtos
Route::get('/produtos', [ProdutoController::class, 'index'])->name('produtos.index'); 
Route::get('/produtos/incluir', [ProdutoController::class, 'create'])->name('produtos.incluir'); 
Route::post('/produtos', [ProdutoController::class, 'store'])->name('produtos.store'); 
Route::get('/produtos/{codigo}', [ProdutoController::class, 'show'])->name('produtos.vizualiza'); 
Route::get('/produtos/{codigo}/editar', [ProdutoController::class, 'edit'])->name('produtos.editar');
Route::put('/produtos/{codigo}', [ProdutoController::class, 'update'])->name('produtos.update'); 
Route::delete('/produtos/{codigo}', [ProdutoController::class, 'destroy'])->name('produtos.delete');


//associar
Route::get('/clientes/{cliente}/associar-produtos', [ClienteController::class, 'associarProdutos'])->name('clientes.associar');
Route::post('/clientes/{cliente}/associar-produtos', [ClienteController::class, 'associarStore'])->name('clientes.associar.salvar');


Route::get('/produtos/{codigo}/associar', [ProdutoController::class, 'associar'])->name('produtos.associar');
Route::post('/produtos/{codigo}/associar', [ProdutoController::class, 'associarStore'])->name('produtos.associar.salvar');