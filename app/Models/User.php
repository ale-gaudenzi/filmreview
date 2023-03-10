<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = "user";
    protected $primaryKey = "user_id";
    public $timestamps = false;
    use HasFactory;

    protected $fillable = ['username', 'password', 'email', 'isAdmin'];
    
    public function reviews() {
        return $this->hasMany(Review::class);
    }    
}
