<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Author;
use App\Http\Controllers\Api\AuthorController;
use App\Http\Controllers\Api\BooksController;
use App\Http\Controllers\Api\BookcopiesController;
use App\Http\Controllers\Api\categoriesController;
use App\Http\Controllers\Api\LoansController;
use App\Http\Controllers\Api\MembersController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/authors_from_api', function () {
    return response()->json([
        'authors' => Author::all(),
    ]);
});


Route::get('/authors', [AuthorController::class, 'index']);
Route::post('/authors', [AuthorController::class, 'store']);
Route::get('/authors/{id}', [AuthorController::class, 'show']);
Route::post('/authors/{id}', [AuthorController::class, 'update']);
Route::get('/authors/{id}', [AuthorController::class, 'destroy']);

Route::apiResource('books', BooksController::class);

Route::apiResource('book_copies', BookcopiesController::class);

Route::apiResource('categories', categoriesController::class);

Route::apiResource('members', MembersController::class);

Route::apiResource('loans', LoansController::class);
