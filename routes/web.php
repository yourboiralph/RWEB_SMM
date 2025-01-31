<?php

use App\Http\Controllers\ClientApprovalController;
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
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/client/dashboard', function(){
    return view('client.dashboard');
})->name('client.dashboard');


Route::get('/client/projectdev', [ClientApprovalController::class, 'index'])->name('client.projectdev');
Route::view('/client/profile', 'client.profile')->name('client.profile');
Route::view('/client/promotions', 'client.promotions')->name('client.promotions');

// MODALS
Route::view('/proj', 'components.modal.select-client');

// ADMINS
Route::view('/admin/joborder', 'admin.joborder')->name('admin.joborder');
Route::get('/admin/project/create', [ProjectController::class, 'create'])->name('admin.project.create');
Route::get('/admin/project/view/{id}', [ProjectController::class, 'show'])->name('admin.project.view');
Route::get('/admin/project/edit/{id}', [ProjectController::class, 'edit'])->name('admin.project.edit');
Route::put('/admin/project/update/{id}', [ProjectController::class, 'update'])->name('admin.project.update');
Route::get('/admin/project/delete', [ProjectController::class, 'destroy'])->name('admin.project.delete');
Route::post('/admin/project/store', [ProjectController::class, 'store']);
Route::get('/admin/project', [ProjectController::class, 'index'])->name('admin.project');


Route::get('admin/joborder', [JobController::class, 'index'])->name('admin.joborder');
Route::get('/admin/joborder/create', [JobController::class, 'create'])->name('admin.joborder.create');
Route::post('/admin/joborder/store', [JobController::class, 'store']);

require __DIR__.'/auth.php';
