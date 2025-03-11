<?php

use App\Livewire\Kelas;
use Illuminate\Support\Facades\Route;

Route::get('kelas', Kelas::class)
    ->middleware(['auth'])
    ->name('kelas');

Route::view('/', 'welcome')->name('beranda');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';


