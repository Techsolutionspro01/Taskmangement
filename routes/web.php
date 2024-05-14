<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
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
Route::delete('users/delete/{id}', [UserController::class, 'delete'])->name('users.delete');




// Temporary Routes Goes Here
Route::get('/assign-task', function () {
    return view('task.assign-task');
})->name('assign-task');
