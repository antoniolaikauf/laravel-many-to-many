<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\typeController;
use App\Http\Controllers\projectController;

// creazione della rotta 1
Route::get('/', [typeController::class, 'index'])->name('pages.index');
// creazione della rotta 2 è uguale alla prima ma si usano due controller diversi 
Route::get('/project', [projectController::class, 'index'])->name('pages.index');
