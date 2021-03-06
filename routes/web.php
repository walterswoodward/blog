<?php

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Log\Logger;
use Illuminate\Support\Facades\DB;
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
    // One way to use native framework tools to view queries:
    // \Illuminate\Support\Facades\DB::listen(function ($query){logger($query->sql, $query->bindings);});

    // Another way:
    // DB::enableQueryLog();
    // Post::with('category')->get();
    // $queries = DB::getQueryLog();
    // dd($queries);

    return view('posts', ['posts' => Post::latest()->with(['category', 'author'])->get()]);
});

Route::get('posts/{post:slug}', function (Post $post) { // Post::where('slug', $post)->firstOrFail()
    return view('post', ['post' => $post]);
});

Route::get('categories/{category:slug}', function (Category $category) {
    // \Illuminate\Support\Facades\DB::listen(function ($query){logger($query->sql, $query->bindings);});
    return view('posts', [ 'posts' => $category->posts->load(['category', 'author'])]);
});

Route::get('authors/{author:username}', function (User $author) {
    return view('posts', ['posts' => $author->posts->load(['category', 'author'])]);
});
