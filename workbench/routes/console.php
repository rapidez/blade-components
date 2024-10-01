<?php

use Illuminate\Support\Facades\Artisan;

Artisan::command('components', function () {
    config(['cache.default' => 'array']);
    file_put_contents('demo/components.html', view('rapidez::components-preview'));
});
