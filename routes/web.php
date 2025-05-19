<?php

use App\Models\Article;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\KonselorController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SesiKonselingController;
use App\Http\Controllers\PendaftaranKonselingController;

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


Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login_post', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);



Route::get('/', [WebsiteController::class, 'index']);
Route::get('/konselor', [WebsiteController::class, 'konselor']);
Route::get('/sesi_konseling', [WebsiteController::class, 'sesi_konseling']);
Route::get('/sesi_konseling/{id}', [WebsiteController::class, 'sesi_konseling_detail']);
Route::post('/sesi_konseling_post', [WebsiteController::class, 'article']);

//article
Route::get('/article', [WebsiteController::class, 'article']);
Route::get('/article/{id}', [WebsiteController::class, 'showArticle'])->name('website.article.detail');


// Route Mahasiswa
Route::group(['middleware' => ['is_mahasiswa']], function () {
    Route::get('/mahasiswa/dashboard', [DashboardController::class, 'index_mahasiswa']);

    Route::get('/mahasiswa/pendaftaran_konseling', [DashboardController::class, 'pendaftaran_konseling_mahasiswa_index']);
    Route::get('/mahasiswa/pendaftaran_konseling/detail/{id}', [DashboardController::class, 'pendaftaran_konseling_mahasiswa_show']);
    // Diary routes
    Route::get('/mahasiswa/diary', [App\Http\Controllers\DiaryController::class, 'index'])->name('diary.index');
    Route::post('/mahasiswa/diary', [App\Http\Controllers\DiaryController::class, 'store'])->name('diary.store');
    Route::get('/mahasiswa/diary/{id}', [App\Http\Controllers\DiaryController::class, 'show'])->name('diary.show');
    Route::get('/mahasiswa/diary/{id}/edit', [App\Http\Controllers\DiaryController::class, 'edit'])->name('diary.edit');
    Route::put('/mahasiswa/diary/{id}', [App\Http\Controllers\DiaryController::class, 'update'])->name('diary.update');
    Route::delete('/mahasiswa/diary/{id}', [App\Http\Controllers\DiaryController::class, 'destroy'])->name('diary.destroy');

});


// Route Konselor
Route::group(['middleware' => ['is_konselor']], function () {
    Route::get('/konselor/dashboard', [DashboardController::class, 'index_konselor']);
    Route::get('/konselor/sesi_konseling', [DashboardController::class, 'sesi_konseling_konselor']);
    Route::get('/konselor/sesi_konseling/detail/{id}', [DashboardController::class, 'sesi_konseling_konselor_show']);

    Route::get('/konselor/pendaftaran_konseling', [DashboardController::class, 'pendaftaran_konseling_konselor_index']);
    Route::get('/konselor/pendaftaran_konseling/detail/{id}', [DashboardController::class, 'pendaftaran_konseling_konselor_show']);
    Route::get('/konselor/pendaftaran_konseling/edit/{id}', [DashboardController::class, 'pendaftaran_konseling_konselor_edit']);
    Route::post('/konselor/pendaftaran_konseling/update/{id}', [DashboardController::class, 'pendaftaran_konseling_konselor_update']);
});

// Route Admin
Route::group(['middleware' => ['is_admin']], function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index']);

    Route::get('/admin/pendaftaran_konseling', [PendaftaranKonselingController::class, 'index']);
    Route::get('admin/pendaftaran_konseling/detail/{id}', [PendaftaranKonselingController::class, 'show']);
    Route::get('admin/pendaftaran_konseling/edit/{id}', [PendaftaranKonselingController::class, 'edit']);
    Route::post('admin/pendaftaran_konseling/update/{id}', [PendaftaranKonselingController::class, 'update']);
    Route::get('admin/pendaftaran_konseling/destroy/{id}', [PendaftaranKonselingController::class, 'destroy']);

    Route::get('admin/sesi_konseling', [SesiKonselingController::class, 'index']);
    Route::post('admin/sesi_konseling/create', [SesiKonselingController::class, 'store']);
    Route::get('admin/sesi_konseling/detail/{id}', [SesiKonselingController::class, 'show']);
    Route::get('admin/sesi_konseling/edit/{id}', [SesiKonselingController::class, 'edit']);
    Route::post('admin/sesi_konseling/update/{id}', [SesiKonselingController::class, 'update']);
    Route::get('admin/sesi_konseling/destroy/{id}', [SesiKonselingController::class, 'destroy']);

    Route::get('admin/konselor', [KonselorController::class, 'index']);
    Route::post('admin/konselor/create', [KonselorController::class, 'store']);
    Route::get('admin/konselor/detail/{id}', [KonselorController::class, 'show']);
    Route::get('admin/konselor/edit/{id}', [KonselorController::class, 'edit']);
    Route::post('admin/konselor/update/{id}', [KonselorController::class, 'update']);
    Route::get('admin/konselor/destroy/{id}', [KonselorController::class, 'destroy']);

    Route::get('admin/user', [UserController::class, 'index']);
    Route::post('admin/user/create', [UserController::class, 'store']);
    Route::get('admin/user/detail/{id}', [UserController::class, 'show']);
    Route::get('admin/user/edit/{id}', [UserController::class, 'edit']);
    Route::post('admin/user/update/{id}', [UserController::class, 'update']);
    Route::get('admin/user/destroy/{id}', [UserController::class, 'destroy']);

    Route::get('/admin/laporan', [DashboardController::class, 'laporan']);
    Route::get('/admin/laporan/export/{id}', [DashboardController::class, 'laporan_export']);
    
    Route::get('admin/article', [ArticleController::class, 'index'])->name('article.index');
    Route::get('admin/article-add', [ArticleController::class, 'add'])->name('article.add');
    Route::post('admin/article-add', [ArticleController::class, 'store'])->name('article.store');
    Route::get('admin/article/{id}/edit', [ArticleController::class, 'edit'])->name('article.edit');
    Route::put('admin/article/{id}', [ArticleController::class, 'update'])->name('article.update');
    Route::delete('admin/article/{id}', [ArticleController::class, 'destroy'])->name('article.destroy');
    Route::get('admin/article/{id}', [ArticleController::class, 'show'])->name('article.show');

});