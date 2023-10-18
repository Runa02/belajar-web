<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MasterProjectController;
use App\Http\Controllers\MasterSiswaController;
use App\Http\Controllers\MasterKontakController;
use App\Http\Controllers\ProjectController;
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

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/auth', [LoginController::class, 'authenticate'])->name('login.auth');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


Route::middleware(['auth', 'role:admin'])->group(function () {
    //admin
    // Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/masterproject', [MasterProjectController::class, 'index']);
    Route::get('/masterkontak', [MasterKontakController::class, 'index']);
    
    //siswa
    Route::get('/mastersiswa', [MasterSiswaController::class, 'index'])->name('indexsiswa');
    Route::get('/tambah', [MasterSiswaController::class, 'tambah'])->name('tambah');
    Route::post('/tambahsiswa', [MasterSiswaController::class, 'store'])->name('storesiswa');
    Route::get('/mastersiswa/{id}/edit', [MasterSiswaController::class, 'edit_siswa'])->name('siswa.edit');
    Route::post('/siswa/update/{id}', [MasterSiswaController::class, 'update'])->name('updatesiswa');
    Route::get('/siswa/update/{id}/delete', [MasterSiswaController::class, 'destroy'])->name('siswadestroy');
    
    // Project
    Route::resource('/admin/project', ProjectController::class);
    Route::post('/admin/project/store', [ProjectController::class, 'store'])->name('project-store');
    Route::post('/admin/project/{id}/update', [ProjectController::class, 'update'])->name('project-update');
    Route::get('/admin/project/{id}/create', [ProjectController::class, 'add'])->name('project.add');
    Route::delete('/admin/project/{id}/delete', [ProjectController::class, 'delete'])->name('project-delete');
});

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/masterproject', [MasterProjectController::class, 'index']);
    Route::get('/masterkontak', [MasterKontakController::class, 'index']);

    Route::get('/mastersiswa', [MasterSiswaController::class, 'index'])->name('indexsiswa');
    // Route::get('/tambah', [MasterSiswaController::class, 'tambah'])->name('tambah');
    // Route::post('/tambahsiswa', [MasterSiswaController::class, 'store'])->name('storesiswa');
    // Route::get('/mastersiswa/{id}/edit', [MasterSiswaController::class, 'edit_siswa'])->name('siswa.edit');
    // Route::post('/siswa/update/{id}', [MasterSiswaController::class, 'update'])->name('updatesiswa');

    Route::resource('/admin/project', ProjectController::class);
    // Route::post('/admin/project/store', [ProjectController::class, 'store'])->name('project-store');
    // Route::post('/admin/project/{id}/update', [ProjectController::class, 'update'])->name('project-update');
    // Route::get('/admin/project/{id}/create', [ProjectController::class, 'add'])->name('project.add');
});
