<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //QUIERO QUE POR CADA CATEGORIA QUE SE CREE SE REGISTRE 10 REGISTROS DE ARTICULOS
         Category::factory(5)->has(
            Post::factory(10)->state(new Sequence(
                ['is_published' => true,
                  'published_at' =>now()],
                ['is_published' => false,
                  'published_at' =>null]

            ))->has(   //por cada post que se cree que me genere 2 tags , osea relacion de uchos a muchos entre estos dos que hay
                Tag::factory(2)
            )     //estoy pidiendo que se cree los post dentro de este metodo has, eloquient verificara la relcion entre categoria  y post
        )->create();
         //Post::factory(50)->create();
         //Tag::factory(20)->create();
    }
}
