<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::get('/books', [BookController::class, 'index'])->name('api.books.index');
Route::post('/books', [BookController::class, 'store'])->name('api.books.store');
Route::get('/books/{book}', [BookController::class, 'show'])->name('api.books.show');
Route::put('/books/{book}', [BookController::class, 'update'])->name('api.books.update');
Route::delete('/books/{book}', [BookController::class, 'destroy'])->name('api.books.destroy');
