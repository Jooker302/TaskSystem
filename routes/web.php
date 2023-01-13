<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PDFController;
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

Route::get('delete/{id}',[AdminController::class, 'user_delete']);

Route::get('edit/{id}',[AdminController::class, 'edit_user']);

Route::post('update',[AdminController::class, 'update_user']);


Route::get('generate-pdf', [PDFController::class, 'generatePDF']);

Route::get('generate-spdf/{id}', [PDFController::class, 'generatePDFSpecific']);

Route::get('test',[PDFController::class, 'test']);

Route::post('ajax_task',[AdminController::class,'ajax_task']);

Route::post('/ajax_items',[AdminController::class,'ajax_items']);

Route::post('/ajax_more_items',[AdminController::class,'ajax_more_items']);

Route::post('/ajax_question',[AdminController::class,'ajax_question']);

Route::post('/ajax_more_question',[AdminController::class,'ajax_more_question']);

Route::get('view-inspection-items/{id}',[AdminController::class,'view_inspection_items']);

Route::get('view-questions/{id}',[AdminController::class,'view_questions']);

Route::get('delete-task/{id}',[AdminController::class,'delete_task']);

Route::get('edit-task/{id}',[AdminController::class,'edit_task']);

Route::post('update-task',[AdminController::class,'update_task']);

Route::get('edit-inspection-items/{id}',[AdminController::class,'edit_inspection_items']);

Route::post('update-inspection-items',[AdminController::class,'update_inspection_items']);

Route::get('final-approve/{id}',[AdminController::class,'final_approve']);

Route::get('final-unapprove/{id}',[AdminController::class,'final_unapprove']);

