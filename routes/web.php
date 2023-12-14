<?php

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes([
    'reset' => false,
    'verify' => false,
    'register' => false,
]);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('users', App\Http\Controllers\UserController::class);

Route::resource('departments', App\Http\Controllers\DepartmentController::class);

// Route::resource('units', App\Http\Controllers\UnitController::class);

Route::resource('faculties', App\Http\Controllers\FacultyController::class);

Route::resource('divisions', App\Http\Controllers\DivisionController::class);


Route::group(['middleware' => 'auth'], function() {
    Route::resource('goals', App\Http\Controllers\GoalController::class);
    Route::resource('indicators', App\Http\Controllers\IndicatorController::class);
});


