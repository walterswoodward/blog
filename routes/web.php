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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('posts');
});

// curly braces indicate a wild card value
Route::get('posts/{post}', function ($slug) {
    // 1. Find a post by its slug
    // 2. Pass it to a view called "post"
    return view('post', ['post' => Post::find($slug)]);
})->whereNumber('post');
