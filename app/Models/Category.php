<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    //DENTRO DE UNA CATEGORIA PUEDE HABER VARIOS POST Y DENTRO DE UN POST SOLO PERTENECE A UNA CATEGORIA (uno a muchos)
    public function posts() {
        return $this->hasMany(Post::class);
    }
}
