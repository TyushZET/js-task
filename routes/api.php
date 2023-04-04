<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\UserController;
use App\Http\Controllers\person\PersonController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/users',[UserController::class, 'index']);
Route::post('/users/add',[UserController::class, 'store'])->name('users_add');
Route::post('/users/delete/{id}',[UserController::class, 'destroy'])->name('user_delete');
Route::post('/users/update/{id}',[UserController::class, 'update'])->name('user_update');
Route::get('/users/show/{id}',[UserController::class, 'show']);

// VUE ROUTES
Route::post('/peoples',[PersonController::class,'store']);
Route::get('/peoples',[PersonController::class,'index']);
Route::patch('/peoples/{person}',[PersonController::class,'update']);
Route::delete('/peoples/{person}',[PersonController::class,'destroy']);

