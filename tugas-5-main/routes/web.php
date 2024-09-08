<?php

use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login-form');
Route::post('/login', [LoginController::class, 'login'])->name('login-post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('list-mahasiswa')->middleware(Authenticate::class);
Route::get('/create', [MahasiswaController::class, 'create'])->name('create-mahasiswa')->middleware(Authenticate::class);
Route::post('/store', [MahasiswaController::class, 'store'])->name('store-mahasiswa')->middleware(Authenticate::class);
Route::get('/edit/{mahasiswa}', [MahasiswaController::class, 'edit'])->name('edit-mahasiswa')->middleware(Authenticate::class);
Route::put('/update/{mahasiswa}', [MahasiswaController::class, 'update'])->name('update-mahasiswa')->middleware(Authenticate::class);
Route::delete('/delete/{mahasiswa}', [MahasiswaController::class, 'delete'])->name('delete-mahasiswa')->middleware(Authenticate::class);

Route::get('/profile', [ProfileController::class, 'index'])->name('profile')->middleware(Authenticate::class);
Route::get('/profile/avatar/{profile}', [FileUploadController::class, 'FormAvatar'])->name('profile-upload')->middleware(Authenticate::class);
Route::put('/profile/avatar/{profile}', [FileUploadController::class, 'store'])->name('profile-store')->middleware(Authenticate::class);
