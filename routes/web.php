<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\KepenggurusanController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
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

Route::get('/', function () {
    return view('home', [
        'title' => "Home - IKBKSY"
    ]);
});


Route::get('/about/sejarah', function () {
    return view('about.sejarah', [
        'title' => "Sejarah - IKBKSY"
    ]);
})->name('sejarahIKBKSY');

Route::get('/about/visi-misi', function () {
    return view('about.visimisi', [
        'title' => "Visi & Misi - IKBKSY"
    ]);
})->name('visimisiIKBKSY');

// Route::get('/about/pengurus', function () {
//     return view('about.pengurus', [
//         'title' => "Pengurus - IKBKSY"
//     ]);
// })->name('pengurusIKBKSY');

// Route::get('/blog', function () {
//     return view('blog.blog', [
//         'title' => "Blog - IKBKSY"
//     ]);
// })->name('blogIKBKSY');

Route::get('/galeri', function () {
    return view('galeri.galeri', [
        'title' => "galeri - IKBKSY"
    ]);
})->name('galeriIKBKSY');

Route::get('/admin/struktur', function () {
    return view('admin.struktur.index', [
        'title' => "galeri - IKBKSY"
    ]);
});

Auth::routes();

Route::get('/about/pengurus', [KepenggurusanController::class, 'index'])->name('pengurusIKBKSY');
// Route::get('/about/pengurus/add', [KepenggurusanController::class, 'create'])->name('addPengurus');
// Route::post('/about/pengurus/add', [KepenggurusanController::class, 'store'])->name('addPengurus');
// Route::post('/about/pengurus/department/add', [DepartmentController::class, 'store'])->name('addDepartment');

Route::get('/blog', [BlogController::class, 'index'])->name('blogIKBKSY');
Route::get('/blog/testing', [BlogController::class, 'create'])->name('blogIKBKSY');
Route::get('/blog/add', [BlogController::class, 'create'])->name('addBlog');



// admin
Route::get('/admin', [HomeController::class, 'index'])->name('admin');

// Pengurus
Route::get('/admin/struktur/pengurus/', [KepenggurusanController::class, 'all'])->name('allPengurus');
Route::get('/admin/struktur/pengurus/add', [KepenggurusanController::class, 'create'])->name('addPengurus');
Route::post('/admin/struktur/pengurus/add', [KepenggurusanController::class, 'store'])->name('addPengurus');
Route::get('/admin/struktur/pengurus/edit/{id}', [KepenggurusanController::class, 'edit'])->name('updatePengurus');
Route::patch('/admin/struktur/pengurus/edit/{id}', [KepenggurusanController::class, 'update'])->name('updatePengurus');
Route::delete('/admin/struktur/pengurus/{id}', [KepenggurusanController::class, 'destroy'])->name('deletePengurus');

// Department
Route::get('/admin/struktur/department/', [DepartmentController::class, 'index'])->name('department');
Route::get('/admin/struktur/department/add', [DepartmentController::class, 'create'])->name('addDepartment');
Route::post('/admin/struktur/department/add', [DepartmentController::class, 'store'])->name('addDepartment');
Route::get('/admin/struktur/department/edit/{id}', [DepartmentController::class, 'edit'])->name('updateDepartment');
Route::patch('/admin/struktur/department/edit/{id}', [DepartmentController::class, 'update'])->name('updateDepartment');
Route::delete('/admin/struktur/department/{id}', [DepartmentController::class, 'destroy'])->name('deleteDepartment');
