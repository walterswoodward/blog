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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('posts');
});

// curly braces indicate a wild card value
Route::get('posts/{id}', function ($id) {
    $post = file_get_contents(__DIR__ . '/../resources/posts/'.$id.'.html');
    return view('post', [
        'post' => $post
    ]);
});