<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = "user";
    public $timestamps = false;
    use HasFactory;

    protected $fillable = ['username', 'password', 'email'];
    
    public function reviews() {
        return $this->hasMany(Review::class);
    }    
    

}
