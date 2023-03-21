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
                'summary' => $this->faker->text(200),
                'content' => $this->faker->paragraph(5 , true),
                'image_url' => $this->faker->imageUrl(640, 480),
                //'is_published' => true, //comento esto ya que me esta todando el valor de mi archivo DataTableSeeder.php donde indique que por la relacion que tienen de muchos a muchos lo llene

                //LO QUE HICIMOS AQUI ES ENTRAR AL MODELO CATEGORIA Y QUE ME LLENE AL AZAR CON EL ID DE LA CATEGORIA
                //'category_id' => Category::all()->random()->id, //aqui el digo que recupere el id de alguna categoria

                //OTRA FORMA DE LLENAR EL CAMPO CATEGORIA

                'user_id' => $this->faker->numberBetween(1,3),
                //'published_at' => now(), //comento esto ya que me esta todando el valor de mi archivo DataTableSeeder.php donde indique que por la relacion que tienen de muchos a muchos lo llene

            ];



    }
}
