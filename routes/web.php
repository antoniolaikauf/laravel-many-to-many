<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\typeController;
use App\Http\Controllers\projectController;

// creazione della rotta per pagina iniziale
Route::get('/', [typeController::class, 'index'])->name('pages.index');
// creazione rotta per portare alla pagina per creare nuovo progetto
Route::get('/project/create', [typeController::class, 'create'])->name('pages.create');
// creazione rotta per portare alla pagina per aggiungere il nuovo componente 
Route::post('/project/store', [typeController::class, 'store'])->name('pages.store');
// rotta per portare alla pagina dell'edit
Route::get('/project/{id}/edit', [typeController::class, 'edit'])->name('pages.edit');
// rotta per portare a pagina show
Route::get('/project/{id}', [typeController::class, 'show'])->name('pages.show');
// route per metodo delete 
Route::delete('/project/{id}7delete', [typeController::class, 'delete'])->name('pages.delete');
// rotta che permette di aggiornare un nuovo progetto
Route::put('/project/{id}/upgrade', [typeController::class, 'upgrade'])->name('pages.upgrade');
// creazione della rotta 2 è uguale alla prima ma si usano due controller diversi 
Route::get('/project', [projectController::class, 'index'])->name('pages.project.index');
