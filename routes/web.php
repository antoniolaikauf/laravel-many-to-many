<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\typeController;
use App\Http\Controllers\projectController;

// creazione della rotta 1
Route::get('/', [typeController::class, 'index'])->name('type.index');
Route::get('/project/create', [typeController::class, 'create'])->name('pages.create');
Route::post('/project/store', [typeController::class, 'store'])->name('pages.store');
// creazione della rotta 2 è uguale alla prima ma si usano due controller diversi 
Route::get('/project', [projectController::class, 'index'])->name('pages.project.index');
