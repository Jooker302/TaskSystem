<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\TaskController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    // Route::get('all-task',[TaskController::class, 'all_task']);
    return $request->user();
});
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('all-task',[TaskController::class, 'all_task']);
    Route::post('all-complete-task',[TaskController::class, 'all_complete_task']);
    Route::post('all-pending-task',[TaskController::class, 'all_pending_task']);
    Route::post('complete-task',[TaskController::class, 'store_complete_task']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/upload-task-file', [AuthController::class, 'upload_task_file']);
    Route::post('/search-task', [AuthController::class, 'search_task']);
});

// Route::post('/register', [AuthController::class, 'createUser']);
Route::post('/login', [AuthController::class, 'loginUser']);
