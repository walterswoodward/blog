<?php

namespace App\Models;

class Post
{
    public static function find($slug)
    {
        // A better way to get this path is to use the helper function: resource_path()
        //  if (!file_exists($path = __DIR__ . '/../resources/posts/'.$slug.'.html')) {
        if (!file_exists($path = resource_path("posts/{$slug}.html"))) {  
            // If there is no post for this slug, use Laravel's ModelNotFoundException
            throw new ModelNotFoundException();
        }

        return cache()->remember("posts.{$slug}", 1200, function () use ($path) {
            return file_get_contents($path); 
        });
    }
} 