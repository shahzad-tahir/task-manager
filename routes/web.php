<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', DashboardController::class)->name('dashboard');

Route::resource('tasks', TaskController::class)->except([
    'index', 'show'
]);

Route::get('update-priority', [TaskController::class, 'updatePriority'])->name('tasks.update-priority');

Route::resource('projects', ProjectController::class)->except([
    'index', 'show'
]);
