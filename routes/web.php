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

Route::get('/posts', function () {
    return view('posts');
});

Route::get('/posts/{post}', function ($slug) {
    $post_id = $slug;

    $path = __DIR__."/../resources/posts/post-{$post_id}.html";

    if(!file_exists($path)){
        abort(404);
    }
    
    $post = file_get_contents($path);
    return view('post', [
        'post' => $post
    ]);
});