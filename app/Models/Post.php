<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


//PARA TRABAJAR CON ACCESSORES
use Illuminate\Database\Eloquent\Casts\Attribute;

class Post extends Model
{
    use HasFactory;

    protected $fillable= [
        'title',
        'slug',
        'summary',
        'content',
        'image_url',
        'is_published',
        'category_id',
        'user_id',
        'published_at',
    ];


//MPLEMENTACION DE MI accesores aplicado a title (ESTO HACE QUE TODO EL TITLO SE VUELVA A MAYUSCULA)
    public function title():Attribute{
        return new Attribute(
            get: function($value){
                return strtoupper($value);
            }
        );
    }

    public function image():Attribute{
        return new Attribute(
            get: function(){
                return $this->image_url ?? 'https://seeklogo.com/images/E/ESCUDO_POLICIA_NACIONAL_DEL_PERU-logo-E874C71F6F-seeklogo.com.png';
            }
        );
    }


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
