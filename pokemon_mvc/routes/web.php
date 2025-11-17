'<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CadastrarPokemonController;
use App\Http\Controllers\XmlController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/cadastrar-pokemon', function () {
    return view('cadastrar-pokemon');
})->middleware(['auth', 'verified'])->name('cadastrar-pokemon');

Route::post('/cadastrar-pokemon', [CadastrarPokemonController::class, 'salvar_pokemon'])->middleware(['auth', 'verified'])->name('cadastrar-pokemon');

Route::get('/data-xml', [XmlController::class, 'gerarXML'])->middleware(['auth', 'verified'])->name('data-xml');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
