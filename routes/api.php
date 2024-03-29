<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });



use App\Http\Controllers\UserController;
Route::post('/auth/register', [UserController::class, 'register']);
Route::get('/user/', [UserController::class, 'index'])->middleware('auth:sanctum');
Route::get('/user/{user_id}', [UserController::class, 'get'])->middleware('auth:sanctum')->where('user_id', '[0-9]+');;
