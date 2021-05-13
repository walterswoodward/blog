<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = []; // **LOCAL DEVELOPMENT ONLY**

    // For reference: An alternative to using non-default (id) route key name
    // recommended way is to handle this within the routes file (see `{post:slug}`)
    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }

    // Default for all Post queries -- include category and author data (e.g. "auto/eager loading the category and author" vs "lazy loading")
    // Note that if this is implemented you can negate it with Post::without(['author', 'category'])
    // Lastly, when doing this sort of thing at scale, you may want to avoid all of this and:
    // // "instead, extract to a repository or helper method that is responsible for (1) Grabbing posts (2) Applying filters and (3) Eager loading any relationships)"
    // protected $with = ['category', 'author'];

    public function category()
    {
        // hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(Category::class);
    }

    public function author() { // this name assumes a foriegn key of author_id
        // hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(User::class, 'user_id'); // user_id must be explicitly provided as second arg
    }
}
