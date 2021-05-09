<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

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

// Home
Route::get('/', [PageController::class, 'home']);

// User
Route::get('/login', [PageController::class, 'login']);
Route::get('/logoff', [PageController::class, 'logoff']);
Route::post('/login', [PageController::class, 'verifyUser']);
Route::post('/signUser', [PageController::class, 'storageUser']);

// Project
Route::get('/signProject', [PageController::class, 'signProject']);
Route::post('/signProject', [PageController::class, 'storageProject']);

Route::get('/projeto', [PageController::class, 'projeto']);
