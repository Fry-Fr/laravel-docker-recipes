<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;

Route::get('/', [RecipeController::class, 'index'])->name('home');


Route::get('/recipes/create', [RecipeController::class, 'create'])->name('recipes.create');
Route::post('/recipes/create', [RecipeController::class, 'store'])->name('recipes.store');

Route::get('/recipes/{id}/edit', [RecipeController::class, 'edit'])->name('recipes.edit');
Route::get('/recipes/{id}', [RecipeController::class, 'show'])->name('recipes.show');
Route::put('/recipes/{id}', [RecipeController::class, 'update'])->name('recipes.update');
Route::delete('/recipes/{id}', [RecipeController::class, 'destroy'])->name('recipes.destroy');