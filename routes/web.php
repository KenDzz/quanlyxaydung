<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DownloadFileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\WorkController;

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
Route::get('/logout', [AuthenticationController::class, 'logout'])->name('logout');

//Route::get('/dashboard', [DashboardController::class, 'index'])->name('Dashboard')->middleware('role:1');
Route::get('/403',[AuthenticationController::class, 'Error403'])->name('Error403');

Route::post('/upload', [ProjectController::class, 'upload'])->name('upload');

Route::post('/dataworkchart/{type}/{id}', [WorkController::class, 'dataworkchart'])->middleware('auth')->name('datawork');
Route::post('/dataworkchartcount/{id}', [WorkController::class, 'dataworkchartCount'])->middleware('auth')->name('dataworkchartcount');
Route::post('/datacalendar', [WorkController::class, 'datacalendar'])->middleware('auth')->name('datacalendar');


Route::prefix('dashboard')->middleware('auth')->name('Dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index']);
    Route::post('addproject', [DashboardController::class, 'addProject'])->name('-add-project')->middleware('role:1');
    Route::get('project/{id}', [ProjectController::class, 'view'])->name('-project-detail');
    Route::post('addwork', [WorkController::class, 'addWork'])->name('-add-work')->middleware('role:1');
    Route::get('work/{id}', [WorkController::class, 'work'])->name('-work');
    Route::get('work/detail/{id}', [WorkController::class, 'detail'])->name('-work-detail');
    Route::get('work/detail/download/{filename}', [DownloadFileController::class, 'downloadFile'])->name('-download');
    Route::get('calendar', [WorkController::class, 'calendar'])->name('-calendar');

});
