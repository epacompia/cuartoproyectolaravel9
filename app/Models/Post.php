<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable= [
        'title',
        'slug',
        'content',
        'image_url',
        'is_published',
        'category_id',
        'user_id',
        'published_at',
    ];


    //RELACION UNO A MUCOHOS INVERSA Post - User
    public function user(){
        return $this->belongsTo(User::class);
    }

    //RELACION UNO A MUCOHOS INVERSA Post - Category
    public function category(){
        return $this->belongsTo(Category::class);
    }


    //UN POST PUEDE TENER MULTIPLES ETIQUETAS Y UNA EITQUETA PUEDE ESTAS EN MULTIPLES POST (RELACION DE MUCHOS A MUCHOS)
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

}
