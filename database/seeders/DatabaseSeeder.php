<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
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



        //aqui iba el User para llevar sus valores pero lo lleve al UserSeeder, para eso tuve que crear un seeder con php artisan make:seeder UserSeeder
        $this->call(UserSeeder::class); //aqui llamo a mi UserSeeder para que cuando ejecute php artisan db:seed se ejecute el seeder y tambien el UserSeeder




        //PRIMERO DEBE EJECUTARSE LOS FACTORIES DE LAS TABLAS INDIVIDUALES OSEA QUE NO DEPENDEN DE NADIE
       //PARA CATEGORY
       $this->call(CategorySeeder::class);



        //User::factory(10)->unverified()->create(); //esto me ejecuta el campo no verificado osea lo que esta en mi funcion unverified de mi archivo UserFactory.php, es decir ahora ejecuto  php artisan db:seed y me pondra en null este campo

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);



    }
}
