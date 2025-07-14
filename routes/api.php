<?php

use App\Http\Controllers\Api\PermController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\SalesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\VehicleController;

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
Route::apiResource('/user', UserController::class);
Route::apiResource('/role', RoleController::class);
Route::apiResource('/perm', PermController::class);
Route::apiResource('/vehicle', VehicleController::class);
Route::apiResource('/department', VehicleController::class);
// Route::get('/user/{?$user}', [UserController::class, 'show']);

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
// Route::get('/clients', [SalesController::class, 'api'])->name('api.sales');
