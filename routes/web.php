<?php

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

Route::get('/about/pengurus', function () {
    return view('about.pengurus', [
        'title' => "Pengurus - IKBKSY"
    ]);
})->name('pengurusIKBKSY');

Route::get('/blog', function () {
    return view('blog.blog', [
        'title' => "Blog - IKBKSY"
    ]);
})->name('blogIKBKSY');

Route::get('/galeri', function () {
    return view('galeri.galeri', [
        'title' => "galeri - IKBKSY"
    ]);
})->name('galeriIKBKSY');
