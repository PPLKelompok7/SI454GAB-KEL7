<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/login', [App\Http\Controllers\LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login_post', [App\Http\Controllers\LoginController::class, 'authenticate']);
Route::get('/logout', [App\Http\Controllers\LoginController::class, 'logout']);

Route::get('/register', [App\Http\Controllers\RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [App\Http\Controllers\RegisterController::class, 'store']);



Route::get('/', [App\Http\Controllers\WebsiteController::class, 'index']);
Route::get('/konselor', [App\Http\Controllers\WebsiteController::class, 'konselor']);
Route::get('/sesi_konseling', [App\Http\Controllers\WebsiteController::class, 'sesi_konseling']);
Route::get('/sesi_konseling/{id}', [App\Http\Controllers\WebsiteController::class, 'sesi_konseling_detail']);
Route::post('/sesi_konseling_post', [App\Http\Controllers\WebsiteController::class, 'sesi_konseling_post']);


// Route Mahasiswa


// Route Konselor


// Route Admin
