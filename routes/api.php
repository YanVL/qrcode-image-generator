<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BusinessCardController;
use App\Http\Controllers\AuthController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user()->id;
});

route::post('/register', [AuthController::class, 'register']);
route::post('/login', [AuthController::class, 'login']);
route::get('/businesscard/{id}', [BusinessCardController::class, 'show']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    route::get('/businesscard', [BusinessCardController::class, 'index']);
    route::post('/businesscard', [BusinessCardController::class, 'store']);
    Route::put('/businesscard/{id}', [BusinessCardController::class, 'update']);
    Route::delete('/businesscard/{id}', [BusinessCardController::class, 'destroy']);
    route::post('/logout', [AuthController::class, 'logout']);
});
