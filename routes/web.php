<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DashboardController;


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

Route::get('/', [AuthenticationController::class, 'index'])->name('index');
Route::post('/login', [AuthenticationController::class, 'login']);
//Route::get('/dashboard', [DashboardController::class, 'index'])->name('Dashboard')->middleware('role:1');
Route::get('/403',[AuthenticationController::class, 'Error403'])->name('Error403');


Route::prefix('dashboard')->middleware('auth')->name('Dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index']);
    Route::post('addproject', [DashboardController::class, 'addProject'])->name('add-project');
});
