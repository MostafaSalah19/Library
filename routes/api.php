<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Author;
use App\Http\Controllers\Api\AuthorController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/authors_from_api', function () {
    return response()->json([
        'authors' => Author::all(),
    ]);
    
});


Route::get('/authors', [AuthorController::class, 'index']);
