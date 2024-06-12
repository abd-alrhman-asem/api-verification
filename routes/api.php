<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::prefix('Auth')->group(function () {
// Auth Routes
    include __DIR__ . "/Auth/AuthRoutes.php";
});
//fallback route handling
Route::fallback(function () {
    return notFoundResponse('invalid Url , ulr not found');
});

//Route::middleware('auth:sanctum')
//    ->group(function () {
//        Route::post('/logout', [\App\Http\Controllers\Auth\LoginRefreshController::class, 'logout']);
//    });
