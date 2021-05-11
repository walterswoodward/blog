<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{
    public $title;

    public $excerpt;

    public $date;

    public $body;

    public $slug;

    public function __construct($title, $excerpt, $date, $body, $slug)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }

    // PHP 8 allows for this:
    // public function __construct(
    //     public string $title,
    //     public string $excerpt,
    //     public DateTimeImmutable $date,
    //     public string $body,
    // ) {}

    public static function all()
    {
        // === Laravel Collections Approach: Single Loop ===
        // return collect(File::files(resource_path("posts/")))->map(function ($file) {
        //     $document = YamlFrontMatter::parseFile($file);
        //     return new Post(
        //         $document->title,
        //         $document->excerpt,
        //         $document->date,
        //         $document->body(),
        //         $document->slug
        //     );
        // });

        // === array_map approach ===
        // return array_map(function ($file) {
        //     $document = YamlFrontMatter::parseFile($file);
        //     return new Post(
        //         $document->title,
        //         $document->excerpt,
        //         $document->date,
        //         $document->body(),
        //         $document->slug
        //     );
        // }, File::files(resource_path("posts/")));

        // === Laravel Collections Approach: Two Loops (more readable) ===
        return collect(File::files(resource_path("posts/")))
            ->map(function ($file) {
                return YamlFrontMatter::parseFile($file);
            })
            ->map(function ($document) {
                return new Post(
                    $document->title,
                    $document->excerpt,
                    $document->date,
                    $document->body(),
                    $document->slug
                );
            });
    }
    
    public static function find($slug)
    {
        // Find blog post that matches given slug
        // Return new Post object of that post
        return static::all()->firstWhere('slug', $slug); 
    }
} 