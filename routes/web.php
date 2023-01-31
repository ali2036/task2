<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UploadImageController;
use App\Http\Controllers\ScheduleMeetingController;


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

Route::get('/', function () {
    return view('welcome');
});
Route::post('/upload', [UploadImageController::class, 'upload']);
Route::get('/index', [UploadImageController::class, 'index']);
Route::get('/meeting', [ScheduleMeetingController::class, 'getAvailableSlot']);
