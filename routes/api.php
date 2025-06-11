<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

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

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout',[AuthController::class, 'logout']);
Route::get('/tickets',function(){
    return \App\Models\Ticket::all();
});