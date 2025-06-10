<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::apiResource('tickets', \App\Http\Controllers\Api\V1\TicketController::class);
Route::get('/tickets',function(){
    return \App\Models\Ticket::all();
});