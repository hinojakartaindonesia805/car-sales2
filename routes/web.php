<?php

use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\KandidatController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SantriController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\SuaraController;
use Illuminate\Support\Facades\Auth;
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
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('cek-data', [HomeController::class, 'cekData'])->name('cek-data');
Route::get('kegiatan-list', [HomeController::class, 'kegiatan'])->name('kegiatan');
Route::get('kandidat/{id}', [HomeController::class, 'kandidat'])->name('kandidat');
Route::get('voting', [HomeController::class, 'vote'])->name('voting');
Route::get('hasil/{id}', [HomeController::class, 'hasil'])->name('hasil');
Route::get('hasil-json/{id}', [HomeController::class, 'hasilJson'])->name('hasil-json');

Route::post('/register', [RegisterController::class, 'store']);


Route::group(['middleware' => 'auth'], function () {

	Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

	// DATA SANTRI 
	Route::get('/santri-management', [SantriController::class, 'userManagement'])->name('santri-management');
	Route::post('/tambah-santri', [SantriController::class, 'tambahUser'])->name('tambah-santri');
	Route::post('/update-santri/{id}', [SantriController::class, 'updateUser'])->name('update-santri');
	Route::get('/delete-santri/{id}', [SantriController::class, 'deleteUser'])->name('delete-santri');
	// DATA KANDIDAT 
	Route::get('/kandidat-management', [KandidatController::class, 'index'])->name('kandidat-management');
	Route::post('/tambah-kandidat', [KandidatController::class, 'store'])->name('tambah-kandidat');
	Route::post('/update-kandidat/{id}', [KandidatController::class, 'update'])->name('update-kandidat');
	Route::get('/delete-kandidat/{id}', [KandidatController::class, 'delete'])->name('delete-kandidat');
	// DATA KANDIDAT 
	Route::get('/kegiatan-management', [KegiatanController::class, 'index'])->name('kegiatan-management');
	Route::post('/tambah-kegiatan', [KegiatanController::class, 'store'])->name('tambah-kegiatan');
	Route::post('/update-kegiatan/{id}', [KegiatanController::class, 'update'])->name('update-kegiatan');
	Route::get('/delete-kegiatan/{id}', [KegiatanController::class, 'delete'])->name('delete-kegiatan');

Route::get('data-suara/{id}', [SuaraController::class, 'index'])->name('data-suara');


    Route::get('/logout', [SessionsController::class, 'destroy']);
	Route::get('/user-management', [InfoUserController::class, 'userManagement'])->name('user-management');
	Route::post('/tambah-user', [InfoUserController::class, 'tambahUser'])->name('tambah-user');
	Route::post('/update-user/{id}', [InfoUserController::class, 'updateUser'])->name('update-user');
	Route::get('/delete-user/{id}', [InfoUserController::class, 'deleteUser'])->name('delete-user');
	Route::get('/user-profile', [InfoUserController::class, 'create']);
	Route::post('/user-profile', [InfoUserController::class, 'store']);
    Route::get('/login', function () {
		return view('dashboard');
	})->name('sign-up');
});



Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [RegisterController::class, 'create']);
    Route::get('/login', [SessionsController::class, 'create']);
    Route::post('/login-post', [SessionsController::class, 'store']);
	Route::get('/login/forgot-password', [ResetController::class, 'create']);
	Route::post('/forgot-password', [ResetController::class, 'sendEmail']);
	Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
	Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');

});

Route::get('/login', function () {
    return view('session/login-session');
})->name('login');