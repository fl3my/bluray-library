<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('/', 'dashboard')->name('dashboard');
    Route::inertia('/movies/create', 'movies/create')->name('movies.create');
    Route::inertia('/movies', 'movies/index')->name('movies.index');

    Route::inertia('/media', 'media/index')->name('media.index');
});

require __DIR__.'/settings.php';
