<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvsluger within a group which
| contains the "web" mslugdleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('posts', ['posts' => Post::all()]);
});

Route::get('posts/{post}', function (Post $post) { // Post::where('slug', $post)->firstOrFail()
    return view('post', ['post' => $post]);
});
