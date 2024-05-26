<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        // add all your fillable attributes here
        'original_title', 'overview', 'poster_path', 'backdrop_path', 
        'release_date', 'length', 'quality', 'country', 'genre', 'category'
    ];

    // Define the relationship with CatalogItem
    public function catalogItem()
    {
        return $this->hasOne(CatalogItem::class, 'movie_id');
    }
}

