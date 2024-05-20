<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//Grupo para usuarios autenticados
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //ruta para mostrar productos
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    //ruta para crear productos
    Route::get('/products/crear', [ProductController::class, 'create'])->name('products.create');
    //ruta para guardar productos
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    //ruta para mostrar un producto
    Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
    //ruta para editar un producto
    Route::get('/products/{product}/editar', [ProductController::class, 'edit'])->name('products.edit');
    //ruta para actualizar un producto
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    //ruta para eliminar un producto
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

});

require __DIR__.'/auth.php';
