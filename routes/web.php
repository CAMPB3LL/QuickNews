<?php

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

Route::get('/', function () {
    return view('index');
});

Route::get('articles/{article}', function ($slug) {
    $path = __DIR__ . "/../resources/articles/{$slug}.htm";

    if (! file_exists($path)) {
        return redirect('/');
    }

    $article = file_get_contents($path);

    return view('article', [
        'article' => $article
    ]);
});