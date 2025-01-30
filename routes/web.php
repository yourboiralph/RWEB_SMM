<?php

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

Route::view('/client/projectdev', 'client.project-development')->name('client.projectdev');
Route::view('/client/profile', 'client.profile')->name('client.profile');
Route::view('/client/promotions', 'client.promotions')->name('client.promotions');

// MODALS
Route::view('/proj', 'components.modal.select-client');

// ADMINS
Route::view('/admin/joborder', 'admin.joborder')->name('admin.joborder');
Route::get('/admin/project/create', [ProjectController::class, 'create'])->name('admin.project.create');
Route::post('/admin/project/store', [ProjectController::class, 'store']);

Route::get('/admin/project', [ProjectController::class, 'index'])->name('admin.project');

require __DIR__.'/auth.php';
