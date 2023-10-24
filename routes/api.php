<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIs\V1\StaffController;
use App\Http\Controllers\APIs\V1\StaffTypeController;

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

Route::prefix('hospital')->group(function()
{

    //Staff Types Routes
    Route::apiResource('staff_types', StaffTypeController::class);

    //Staff routes
    Route::apiResource('staff', StaffController::class);

});


