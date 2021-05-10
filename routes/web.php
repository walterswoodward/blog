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
Route::get('posts/{post}', function ($id) {
    $path = __DIR__ . '/../resources/posts/'.$id.'.html';

    if (!file_exists($path)) {
        // What should happen? Any of these could work:
        // dump and die
        // dd('file does not exist');
    
        // dump, die, and debug
        ddd('file does not exist');
    
        // throw laravel 404
        // abort(404);
    
        // redirect to homepage
        // return redirect('/');
    }

    $post = file_get_contents($path);
    return view('post', [
        'post' => $post
    ]);
})->whereNumber('post');
// The above is a shorthand for below. See more here: https://laravel.com/api/8.x/Illuminate/Routing/Route.html
// })->where('post', '[0-9]+');
