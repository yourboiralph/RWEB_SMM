<?php

use App\Http\Controllers\AdminApprovalController;
use App\Http\Controllers\ClientApprovalController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/client/profile', [ProfileController::class, 'index'])->name('client.profile');
    Route::get('/client/profile/edit', [ProfileController::class, 'edit'])->name('client.profile.edit');
    Route::put('/client/profile/update', [ProfileController::class, 'update'])->name('client.profile.update');
    Route::delete('/client/profile/destroy', [ProfileController::class, 'destroy'])->name('client.profile.destroy');
});


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/client/projectdev', [ClientApprovalController::class, 'index'])->name('client.projectdev');
Route::get('/client/projectdev/form/approval/{id}', [ClientApprovalController::class, 'show'])->name('client.projectdev.form.approval');
Route::put('/client/projectdev/form/approval/{id}/approve', [ClientApprovalController::class, 'approve'])->name('client.projectdev.form.approval.approve');

Route::get('/admin/projectdev', [AdminApprovalController::class, 'index'])->name('admin.projectdev');
Route::get('/admin/projectdev/form/approval/{id}', [AdminApprovalController::class, 'show'])->name('admin.projectdev.form.approval');
Route::put('/admin/projectdev/form/approval/{id}/approve', [AdminApprovalController::class, 'approve'])->name('admin.projectdev.form.approval.approve');


Route::view('/client/promotions', 'client.promotions')->name('client.promotions');

// MODALS
Route::view('/proj', 'components.modal.select-client');

// ADMINS

Route::get('/admin/project/create', [ProjectController::class, 'create'])->name('admin.project.create');
Route::get('/admin/project/view/{id}', [ProjectController::class, 'show'])->name('admin.project.view');
Route::get('/admin/project/edit/{id}', [ProjectController::class, 'edit'])->name('admin.project.edit');
Route::put('/admin/project/update/{id}', [ProjectController::class, 'update'])->name('admin.project.update');
Route::get('/admin/project/destroy', [ProjectController::class, 'destroy'])->name('admin.project.destroy');
Route::post('/admin/project/store', [ProjectController::class, 'store']);
Route::get('/admin/project', [ProjectController::class, 'index'])->name('admin.project');

Route::get('admin/joborder', [JobController::class, 'index'])->name('admin.joborder');
Route::get('/admin/joborder/create', [JobController::class, 'create'])->name('admin.joborder.create');
Route::post('/admin/joborder/store', [JobController::class, 'store']);

require __DIR__.'/auth.php';
