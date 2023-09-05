<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MasterProjectController;
use App\Http\Controllers\MasterSiswaController;
use App\Http\Controllers\MasterKontakController;
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

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/about', [AboutController::class, 'about'])->name('about');
Route::get('/projects', [ProjectsController::class, 'projects'])->name('projects');
Route::get('/contact', [ContactController::class, 'contact'])->name('contact');

//admin
Route::get('/admin', [AdminController::class, 'index']);
Route::get('/dashboard', [AdminController::class, 'dashboard']);
Route::get('/masterproject', [MasterProjectController::class, 'index']);
Route::get('/masterkontak', [MasterKontakController::class, 'index']);

//siswa
Route::get('/mastersiswa', [MasterSiswaController::class, 'index'])->name('indexsiswa');
Route::get('/tambah', [MasterSiswaController::class, 'tambah'])->name('tambah');
Route::post('/tambahsiswa', [MasterSiswaController::class, 'store'])->name('storesiswa');
Route::get('/mastersiswa/{id}/edit', [MasterSiswaController::class, 'edit_siswa'])->name('siswa.edit');
Route::get('/siswa/update/{id}', [MasterSiswaController::class, 'edit'])->name('updatesiswa');