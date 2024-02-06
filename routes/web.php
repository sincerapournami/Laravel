<?php

use App\Models\Task;
use App\Models\Book;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\LoginRegisterController;

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

Route::view('/', 'welcome');

Route::controller(LoginRegisterController::class)->group(function() {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');
});

Route::get('/tasks', [App\Http\Controllers\TaskController::class, 'index'])->name('tasks.index');
Route::get('/taskshow/{id}', [App\Http\Controllers\TaskController::class, 'show'])->name('taskshow');
Route::post('/tasks', [App\Http\Controllers\TaskController::class, 'store'])->name('tasks.store');
Route::get('/taskshow/{id}/edit', [App\Http\Controllers\TaskController::class, 'edit'])->name('tasks.edit');
Route::put('/taskedit/{id}', [App\Http\Controllers\TaskController::class, 'update'])->name('tasks.update');
Route::put('/taskdone/{id}', [App\Http\Controllers\TaskController::class, 'complete'])->name('tasks.complete');
Route::delete('/taskdelete/{id}', [App\Http\Controllers\TaskController::class, 'destroy'])->name('tasks.destroy');

Route::get('/books', [App\Http\Controllers\BookController::class, 'index'])->name('books.index');