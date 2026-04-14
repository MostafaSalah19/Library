<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookCopyController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\SessionsController;
use Illuminate\Support\Facades\Gate;

Route::get('/home', function () {
    return view('home');
})->name('home');


Route::middleware('auth')->group(function () {
    
    Route::middleware('admin')->group(function () {
        Route::get('/authors/create', [AuthorController::class, 'create'])->name('authors.create');
        Route::post('/authors', [AuthorController::class, 'store'])->name('authors.store');
        Route::get('/authors/{id}/edit', [AuthorController::class, 'edit'])->name('authors.edit');
        Route::post('/authors/{id}', [AuthorController::class, 'update'])->name('authors.update');
        Route::get('/authors/{id}', [AuthorController::class, 'delete'])->name('authors.delete');

        Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
        Route::post('/books', [BookController::class, 'store'])->name('books.store');
        Route::get('/books/{id}/edit', [BookController::class, 'edit'])->name('books.edit');
        Route::post('/books/{id}', [BookController::class, 'update'])->name('books.update');
        Route::get('/books/{id}', [BookController::class, 'delete'])->name('books.delete');

        Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
        Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::get('/categories/{id}', [CategoryController::class, 'delete'])->name('categories.delete');

        Route::get('/book-copies/create', [BookCopyController::class, 'create'])->name('book-copies.create');
        Route::post('/book-copies', [BookCopyController::class, 'store'])->name('book-copies.store');
        Route::get('/book-copies/{id}/edit', [BookCopyController::class, 'edit'])->name('book-copies.edit');
        Route::get('/book-copies/{id}', [BookCopyController::class, 'delete'])->name('book-copies.delete');


        Route::get('/members/create', [MemberController::class, 'create'])->name('members.create');
        Route::post('/members', [MemberController::class, 'store'])->name('members.store');
        Route::get('/members/{member}/edit', [MemberController::class, 'edit'])->name('members.edit');
        Route::post('/members/{member}', [MemberController::class, 'update'])->name('members.update');
        Route::get('/members/{member}', [MemberController::class, 'delete'])->name('members.delete');


        Route::get('/loans/borrow', [LoanController::class, 'borrow'])->name('loans.borrow');
        Route::post('/loans', [LoanController::class, 'store'])->name('loans.store');
        Route::get('/loans/{loanId}/update', [LoanController::class, 'update'])->name('loans.update');
        Route::get('/loans/{loanId}', [LoanController::class, 'returnBook'])->name('loans.returnBook');
    });

    Route::get('/authors', [AuthorController::class, 'index'])->name('authors.index');


    Route::get('/books', [BookController::class, 'index'])->name('books.index');


    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');


    Route::get('/book-copies', [BookCopyController::class, 'index'])->name('book-copies.index');


    Route::get('/members', [MemberController::class, 'index'])->name('members.index');


    // loans routes
    Route::get('/loans', [LoanController::class, 'index'])->name('loans.index');
});


Route::get('/register', [RegisterController::class, 'create'])->name('register.create');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/login', [SessionsController::class, 'create'])->name('login');
Route::post('/login', [SessionsController::class, 'store'])->name('login.store');
Route::delete('/logout', [SessionsController::class, 'destroy'])->name('logout');

Route::get('/hi', function () {
    Gate::authorize('view-admin');
    return 'Hello In Amidn page';
});
