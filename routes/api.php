<?php

use App\Http\Controllers\UserController;
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

Route::middleware('api')->group(function () {
    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index']);
        Route::get('/{id}', [UserController::class, 'show']);
    });

    Route::get('get-all-skills', [UserController::class, 'getAllSkills']);
    Route::get('get-all-job-positions', [UserController::class, 'getAllJobPositions']);
    Route::post('save-user-requirements', [UserController::class, 'saveUserRequirements']);
    Route::get('get-company-suggests', [UserController::class, 'getCompanySuggests']);
    Route::get('get-job-suggests', [UserController::class, 'getJobSuggests']);
});
