<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatalogItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'rating', 'category', 'views', 'status', 'created_date', 'movie_id'
    ];

    // Define the relationship with Movie
    public function movie()
    {
        return $this->belongsTo(Movie::class, 'movie_id');
    }
}
