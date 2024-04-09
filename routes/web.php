<?php

use App\Http\Controllers\BooksController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/books');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/books/category/{category}', [BooksController::class, 'category'])->name('books.category');
//Route::get('/books/category/{categoryName}', [BooksController::class, 'category'])->name('books.category');
Route::get('/books/author/{author}', [BooksController::class, 'author'])->name('books.author');


//Route::get('/authors', function () {
//    $authors = Cache::remember('authors', 3600, function () {
//        return DB::table('books')->select('author')->distinct()->pluck('author');
//    });
//
//    return view('partials.authors', compact('authors'));
//});



Route::get('/books/search', [BooksController::class, 'search'])->name('books.search');
Route::get('/books', [BooksController::class, 'index'])->name('books.index');
Route::get('/books/create', [BooksController::class, 'create'])->name('books.create')->middleware('auth'); // moved up
Route::post('/books', [BooksController::class, 'store']); // moved up

Route::get('/users/{user}/books', [UserController::class, 'getUserBooks']);
Route::get('/mybooks', [UserController::class, 'showUserBooks'])->name('mybooks')->middleware('auth');
Route::get('/books/filterByCategory', 'App\Http\Controllers\BooksController@filterByCategory');


Route::get('/books/{id}', [BooksController::class, 'show'])->name('books.show');
Route::get('/books/{book}/edit', [BooksController::class, 'edit'])->name('books.edit')->middleware('auth');
Route::put('/books/{book}', [BooksController::class, 'update'])->name('books.update')->middleware('auth');
Route::delete('/books/{book}', [BooksController::class, 'destroy'])->middleware('auth');

require __DIR__.'/auth.php';
