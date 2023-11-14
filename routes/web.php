<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\TypeController;
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

Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('projects/trash', [ProjectController::class, 'trashed'])->name('projects.trash');
    Route::put('projects/{project}/restore', [ProjectController::class, 'restoreTrash'])->name('projects.restore');
    Route::delete('projects/{project}/destroy', [ProjectController::class, 'forceDestroy'])->name('projects.forceDestroy');
    Route::resource('projects', ProjectController::class)->parameters([
        'projects' => 'project:slug'
    ]);
    Route::get('types/trash', [TypeController::class, 'trashed'])->name('types.trash');
    Route::put('types/{type}/restore', [TypeController::class, 'restoreTrash'])->name('types.restore');
    Route::delete('types/{type}/destroy', [TypeController::class, 'forceDestroy'])->name('types.forceDestroy');
    Route::resource('types', TypeController::class)->parameters([
        'types' => 'type:slug'
    ]);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
