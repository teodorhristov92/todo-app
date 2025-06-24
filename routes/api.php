<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TodoController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\PriorityController;
use App\Http\Controllers\Api\AuthController;

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

Route::get('test-api-route', function () {
    return 'API route works!';
});

Route::get('test-auth', function () {
    return response()->json([
        'authenticated' => auth('sanctum')->check(),
        'user' => auth('sanctum')->user(),
        'session_id' => session()->getId(),
        'cookies' => request()->cookies->all()
    ]);
});

// Sanctum authentication
Route::middleware('auth:sanctum')->group(function () {
    Route::post('todos', [TodoController::class, 'store']);
    Route::get('/todos', [TodoController::class, 'index']);
    Route::get('/total-todos', [TodoController::class, 'total']);
    Route::patch('/todos/{todo}', [TodoController::class, 'update']);
    Route::delete('/todos/{todo}', [TodoController::class, 'destroy']);
    Route::get('categories', [CategoryController::class, 'index']);
    Route::get('priorities', [PriorityController::class, 'index']);
    Route::post('logout', [AuthController::class, 'logout']);
});