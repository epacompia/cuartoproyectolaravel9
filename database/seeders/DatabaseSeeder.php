<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->unverified()->create();

        //PRIMERO DEBE EJECUTARSE LOS FACTORIES DE LAS TABLAS INDIVIDUALES OSEA QUE NO DEPENDEN DE NADIE
        //QUIERO QUE POR CADA CATEGORIA QUE SE CREE SE REGISTRE 10 REGISTROS DE ARTICULOS
        Category::factory(5)->has(
            Post::factory(10)->has(   //por cada post que se cree que me genere 2 tags , osea relacion de uchos a muchos entre estos dos que hay
                Tag::factory(2)
            )     //estoy pidiendo que se cree los post dentro de este metodo has, eloquient verificara la relcion entre categoria  y post
        )->create();
         //Post::factory(50)->create();
         //Tag::factory(20)->create();



        //User::factory(10)->unverified()->create(); //esto me ejecuta el campo no verificado osea lo que esta en mi funcion unverified de mi archivo UserFactory.php, es decir ahora ejecuto  php artisan db:seed y me pondra en null este campo

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);



    }
}
