<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\RencanaController;
use App\Http\Controllers\CarouselImageController;
use App\Http\Controllers\RegisterController;
use GuzzleHttp\Middleware;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', 'Auth\LoginController@showLoginForm')->name('/login');

Route::get('/', [ProgramController::class, 'home']);
Route::get('/login', [LoginController::class, 'index']);
Route::post('/login_proses', [LoginController::class, 'login_proses']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/register', [LoginController::class, 'register']);
Route::post('/register_proses', [LoginController::class, 'register_proses']);



Route::get('/anggotakt', [AnggotaController::class, 'anggotaPublik']);
Route::get('/rencanakt', [RencanaController::class, 'rencanaPublik']);
Route::get('/programkt', [ProgramController::class, 'programPublik']);


Route::get('/detailprogram/{id}', [ProgramController::class, 'detailProgram'])->name('detailprogram');
Route::get('/detailrencana/{id}', [RencanaController::class, 'detailrencana'])->name('detailrencana');


Route::group(['prefix' => 'admin', 'middleware' => ['auth'], 'as' => 'admin.'], function(){
    Route::resource('kategori', KategoriController::class);
    Route::resource('rencana', RencanaController::class);
    Route::resource('program', ProgramController::class);
    Route::resource('anggota', AnggotaController::class);
    // Route::resource('profile', ProfileController::class);
    // Route::resource('carousel', CarouselImageController::class);
    Route::get('dashboard', function () {
        return view('welcome');
    });
});


// routes/web.php






