<?php

namespace Database\Factories;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

            $title= $this->faker->sentence();

            //para el slug vamos a comvertirlo a partir del titlo en un slug
            return [
                'title' => $title,
                'slug' => Str::slug($title),  //titulo-de-prueba
                'content' => $this->faker->paragraph(5 , true),
                'image_url' => $this->faker->imageUrl(640, 480),
                'is_published' => true,

                //LO QUE HICIMOS AQUI ES ENTRAR AL MODELO CATEGORIA Y QUE ME LLENE AL AZAR CON EL ID DE LA CATEGORIA
                //'category_id' => Category::all()->random()->id, //aqui el digo que recupere el id de alguna categoria

                //OTRA FORMA DE LLENAR EL CAMPO CATEGORIA

                'user_id' => 1,
                'published_at' => now(),

            ];



    }
}
