<?php

use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\LogoutController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\todo\TodoController;
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
    return view('home');
})->name('home');

Route::name('auth.')->group(function(){
    Route::get('/login', [LoginController::class , 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
    Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
    Route::post('/registers', [RegisterController::class,'store'])->name('registers.store');
    Route::post('/logout', [LogoutController::class , 'logoutAction'])->middleware('auth')->name('logout');
});

Route::middleware('auth')->name('todos.')->group(function(){
    Route::get('todos', [TodoController::class, 'index'])->name('index');
    Route::get('todos/create' , [TodoController::class , 'create'])->name('create');
    Route::post('todos', [TodoController::class, 'store'])->name('store');
    Route::get('todos/{id}', [TodoController::class, 'edit'])->name('edit');
    Route::put('todos/{id}', [TodoController::class, 'update'])->name('update');
    Route::delete('todos/{id}' , [TodoController::class, 'destroy'])->name('destroy');
});


