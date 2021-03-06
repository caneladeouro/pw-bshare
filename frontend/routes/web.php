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
Route::get('/myself', [PageController::class, 'showUser']);
Route::post('/login', [PageController::class, 'verifyUser']);
Route::post('/signUser', [PageController::class, 'storageUser']);
Route::get('/showAuthor/{id}', [PageController::class, 'showAuthor']);

// Project
Route::get('/signProject', [PageController::class, 'signProject']);
Route::post('/signProject', [PageController::class, 'storageProject']);
Route::get('/projeto/{id}', [PageController::class, 'projeto']);


// Pesquisa
Route::get('/pesquisa/{attribute}', [PageController::class, 'pesquisa']);

// Pasta
Route::get('/pasta', [PageController::class, 'pasta']);
Route::get('/signPasta', [PageController::class, 'signPasta']);
