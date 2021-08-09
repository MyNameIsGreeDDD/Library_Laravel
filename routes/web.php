<?php

use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\BooksController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::resource('books', BooksController::class);
Route::post('books/filterByAuthor', [BooksController::class, 'filterByAuthor'])->name('books.filter');
Route::resource('authors', AuthorsController::class);
Route::get('/', function () {
    return view('welcome');
});
