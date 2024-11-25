<?php

use Illuminate\Support\Facades\Route;

config(['cache.default' => 'array']);
Route::view('/', 'rapidez::components-preview');
