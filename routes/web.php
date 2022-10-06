<?php

use App\Models\Post;
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
    // fetch all posts
    $posts = Post::fetchAll();

    // return posts view  
    return view('posts', [
        'posts' => $posts,
    ]);
});

Route::get('/posts/{post}', function ($slug) {

    // get the post from Post Model 
    $post = Post::findOne($slug);

    // return the post view
    return view('post', [
        'post' => $post
    ]);
})->where('post', '[0-9]+');