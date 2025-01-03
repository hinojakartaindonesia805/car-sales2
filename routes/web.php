<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\SpesifikasiController;
use Illuminate\Support\Facades\Route;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;


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
Route::get('/register-user', [RegisterController::class, 'create']);
Route::get('/kategori/{id}', [KategoriController::class, 'show'])->name('show-kategori');
Route::get('/detail-cars/{id}', [CarController::class, 'show'])->name('detail-cars');
Route::get('/detail-berita/{id}', [BeritaController::class, 'show'])->name('detail-berita');


Route::group(['middleware' => 'auth'], function () {

	Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

	Route::get('/informasi', [InformasiController::class, 'index'])->name('informasi');
	Route::post('/update-setting', [InformasiController::class, 'update'])->name('update-setting');
	Route::post('/upload-image', [InformasiController::class, 'imageStore'])->name('upload-image');

	Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori');
	Route::post('/tambah-kategori', [KategoriController::class, 'store'])->name('tambah-kategori');
	Route::post('/update-kategori/{id}', [KategoriController::class, 'update'])->name('update-kategori');
	Route::get('/delete-kategori/{id}', [KategoriController::class, 'destroy'])->name('delete-kategori');

	Route::get('/list-cars/{id}', [CarController::class, 'index'])->name('list-cars');
	Route::post('/tambah-cars', [CarController::class, 'store'])->name('tambah-cars');
	Route::post('/update-cars/{id}', [CarController::class, 'update'])->name('update-cars');
	Route::get('/delete-cars/{id}', [CarController::class, 'destroy'])->name('delete-cars');

	Route::get('/list-spesifikasi/{id}', [SpesifikasiController::class, 'index'])->name('list-spesifikasi');
	Route::get('/tambah-spesifikasi/{id}', [SpesifikasiController::class, 'create'])->name('tambah-spesifikasi');
	Route::post('/store-spesifikasi', [SpesifikasiController::class, 'store'])->name('store-spesifikasi');
	Route::get('/edit-spesifikasi/{id}', [SpesifikasiController::class, 'edit'])->name('edit-spesifikasi');
	Route::post('/update-spesifikasi/{id}', [SpesifikasiController::class, 'update'])->name('update-spesifikasi');
	Route::get('/delete-spesifikasi/{id}', [SpesifikasiController::class, 'destroy'])->name('delete-spesifikasi');


	Route::get('/list-berita', [BeritaController::class, 'index'])->name('list-berita');
	Route::get('/tambah-berita', [BeritaController::class, 'create'])->name('tambah-berita');
	Route::post('/store-berita', [BeritaController::class, 'store'])->name('store-berita');
	Route::get('/edit-berita/{id}', [BeritaController::class, 'edit'])->name('edit-berita');
	Route::post('/update-berita/{id}', [BeritaController::class, 'update'])->name('update-berita');
	Route::get('/delete-berita/{id}', [BeritaController::class, 'destroy'])->name('delete-berita');

	Route::get('/setting', [BannerController::class, 'index'])->name('setting');
	Route::post('/update-setting-banner', [BannerController::class, 'settingBanner'])->name('update-setting-banner');
	Route::post('/update-setting-about', [BannerController::class, 'settingTentangKami'])->name('update-setting-about');
	Route::post('/update-setting-social', [BannerController::class, 'settingSocialMedia'])->name('update-setting-social');
	Route::post('/update-setting-sales', [BannerController::class, 'settingSales'])->name('update-setting-sales');

	Route::post('/tambah-service', [ServiceController::class, 'store'])->name('tambah-service');
	Route::post('/update-service/{id}', [ServiceController::class, 'update'])->name('update-service');
	Route::get('/delete-service/{id}', [ServiceController::class, 'destroy'])->name('delete-service');

	Route::post('/tambah-banner', [BannerController::class, 'store'])->name('tambah-banner');
	Route::post('/update-banner/{id}', [BannerController::class, 'update'])->name('update-banner');
	Route::get('/delete-banner/{id}', [BannerController::class, 'destroy'])->name('delete-banner');

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


Route::get('/sitemap', function () {
    // Buat objek sitemap
    $sitemap = Sitemap::create();

    // Tambahkan rute statis
    $sitemap->add(Url::create(route('home'))->setPriority(1.0));

    // Tambahkan rute dinamis: Kategori
    $categories = App\Models\Kategori::all(); // Ambil semua kategori dari database
    foreach ($categories as $category) {
        $sitemap->add(
            Url::create(route('show-kategori', ['id' => $category->id]))
                ->setPriority(0.8)
                ->setLastModificationDate($category->updated_at)
        );
    }

    // Tambahkan rute dinamis: Cars
    $cars = App\Models\Car::all(); // Ambil semua data mobil
    foreach ($cars as $car) {
        $sitemap->add(
            Url::create(route('detail-cars', ['id' => $car->id]))
                ->setPriority(0.7)
                ->setLastModificationDate($car->updated_at)
        );
    }

    // Tambahkan rute dinamis: Berita
    $beritas = App\Models\Berita::all(); // Ambil semua berita
    foreach ($beritas as $berita) {
        $sitemap->add(
            Url::create(route('detail-berita', ['id' => $berita->id]))
                ->setPriority(0.9)
                ->setLastModificationDate($berita->updated_at)
        );
    }

    // Simpan sitemap ke file sitemap.xml di folder public
    $sitemap->writeToFile(public_path('sitemap.xml'));

    return 'Sitemap berhasil dibuat!';
});

