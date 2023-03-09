<?php

use App\Http\Controllers\TodoController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('todos', [TodoController::class, 'index'])->name('index');
Route::post('todos/store', [TodoController::class, 'store'])->name('todos.store');
Route::get('todos/create', [TodoController::class, 'create'])->name('todos.create');
Route::get('todos/edit/{id}', [TodoController::class, 'edit/{id}'])->name('todos.edit');