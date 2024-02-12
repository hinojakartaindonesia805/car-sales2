<?php

use App\Http\Controllers\AgensiController;
use App\Http\Controllers\BisnisController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\KandidatController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\LogActionController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SantriController;
use App\Http\Controllers\SekertarisController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\SuaraController;
use App\Models\LogAction;
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

Route::post('/register', [RegisterController::class, 'store']);
Route::get('/register-sekertaris', [RegisterController::class, 'registerSekertaris']);
Route::get('/register-customer', [RegisterController::class, 'registerCustomer']);


Route::group(['middleware' => 'auth'], function () {

	Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

	Route::get('/agensi-management', [AgensiController::class, 'index'])->name('agensi-management');
	Route::post('/tambah-agensi', [AgensiController::class, 'store'])->name('tambah-agensi');
	Route::post('/update-agensi/{id}', [AgensiController::class, 'update'])->name('update-agensi');
	Route::get('/delete-agensi/{id}', [AgensiController::class, 'destroy'])->name('delete-agensi');
	Route::post('/referal-update/{id}', [AgensiController::class, 'referalUpdate'])->name('referal-update');
	Route::get('/cek-referal', [AgensiController::class, 'cekReferal'])->name('cek-referal');
	
	Route::get('/sekertaris-list', [SekertarisController::class, 'index'])->name('sekertaris-list');
	Route::get('/sekertaris-detail/{id}', [SekertarisController::class, 'detail'])->name('sekertaris-detail');
	Route::post('/updateStatus/{id}', [SekertarisController::class, 'updateStatus'])->name('updateStatus');
	
	Route::get('/customer-list', [CustomerController::class, 'index'])->name('customer-list');
	Route::get('/customer-detail/{id}', [CustomerController::class, 'detail'])->name('customer-detail');

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


	Route::post('/password-update', [ResetController::class, 'changePassword'])->name('password-update');
	Route::get('/log-action', [LogActionController::class, 'logAction'])->name('log-action');


	
	Route::get('/bisnis-management', [BisnisController::class, 'index'])->name('bisnis-management');
	Route::post('/tambah-bisnis', [BisnisController::class, 'store'])->name('tambah-bisnis');
	Route::post('/update-bisnis/{id}', [BisnisController::class, 'update'])->name('update-bisnis');
	Route::get('/delete-bisnis/{id}', [BisnisController::class, 'destroy'])->name('delete-bisnis');

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