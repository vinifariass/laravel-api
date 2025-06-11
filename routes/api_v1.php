<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\AuthorTicketsController;

// http://localhost:8000/api
// universal resource locator
// tickets
// users

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/', function () {
    return response()->json(['message' => 'Hello API'], 200);
});

Route::middleware('auth:sanctum')->apiResource('tickets', \App\Http\Controllers\Api\V1\TicketController::class);
Route::middleware('auth:sanctum')->apiResource('authors', \App\Http\Controllers\Api\V1\AuthorsController::class);
Route::middleware('auth:sanctum')->apiResource('authors.tickets', AuthorTicketsController::class);
Route::get('/tickets',function(){
    return \App\Models\Ticket::all();
});