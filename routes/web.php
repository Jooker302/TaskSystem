<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SuperAdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

// Route::group(['middleware' => ['issuperadmin']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// });

Route::get('superadmin-dashboard' ,[SuperAdminController::class, 'index']);

Route::get('add-admin', [SuperAdminController::class, 'add_admin']);

Route::post('store-admin', [SuperAdminController::class, 'store_admim']);

Route::get('view-admins', [SuperAdminController::class, 'view']);



Route::get('add-user', [AdminController::class, 'add_user']);

Route::post('store-user', [AdminController::class, 'store_user']);

Route::get('view-users', [AdminController::class, 'view']);

Route::get('assign-task', [AdminController::class, 'assign_task']);

Route::post('store-assign-task',[AdminController::class, 'store_assign_task']);

Route::get('view-task', [AdminController::class, 'view_task']);

Route::get('status-deact/{id}', [AdminController::class, 'user_status_deact']);

Route::get('status-act/{id}', [AdminController::class, 'user_status_act']);
