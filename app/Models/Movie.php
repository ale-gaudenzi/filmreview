<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $table = 'movie';
    use HasFactory;

    protected $fillable = ['title', 'director', 'duration', 'year', 'genre'];

    public function reviews() {
        return $this->hasMany(Review::class);
    }
}