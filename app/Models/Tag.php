<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];



    //RELACION DE MUCHOS A MUCHOS  ENTRE POST Y TAG
    public function posts(){
        return $this->belongsToMany(Post::class);
    }
}
