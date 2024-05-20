<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProjectController;
use App\Models\Project;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Route::group(['middleware' => ['auth']], function() {

    
// });

Auth::routes();

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('roles', RoleController::class);

// User Routes
Route::get('users', [UserController::class, 'index'])->name('users.list');
Route::get('users/create', [UserController::class, 'create'])->name('users.create');
Route::post('users/store', [UserController::class, 'store'])->name('users.store');
Route::get('users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
Route::post('users/update', [UserController::class, 'update'])->name('users.update');
Route::delete('users/destroy/{id}', [UserController::class, 'destroy'])->name('users.destroy');

// Task Routes
Route::get('tasks', [TaskController::class, 'index'])->name('tasks.list');
Route::get('tasks/create', [TaskController::class, 'create'])->name('tasks.create');
Route::post('tasks/store', [TaskController::class, 'store'])->name('tasks.store');
Route::get('tasks/show/{id}', [TaskController::class, 'show'])->name('tasks.show');

// Project Routes
Route::get('projects', [ProjectController::class, 'index'])->name('projects.list');
Route::get('projects/create', [ProjectController::class, 'create'])->name('projects.create');
Route::post('projects/store', [ProjectController::class, 'store'])->name('projects.store');
Route::get('projects/edit/{id}', [ProjectController::class, 'edit'])->name('projects.edit');
Route::post('projects/update', [ProjectController::class, 'update'])->name('projects.update');
Route::delete('projects/destroy/{id}', [ProjectController::class, 'destroy'])->name('projects.destroy');


// Temporary Routes Goes Here
Route::get('/assign-task', function () {
    return view('task.assign-task');
})->name('assign-task');
