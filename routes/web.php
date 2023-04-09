<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [UserController::class, 'index'])->name('data-view');
Route::get('create', [UserController::class, 'create'])->name('create');
Route::Post('register', [UserController::class, 'registerUser'])->name('register-user');
Route::get('edit/{id}', [UserController::class, 'edit'])->name('edit-user');
Route::post('update', [UserController::class, 'update'])->name('update-user');