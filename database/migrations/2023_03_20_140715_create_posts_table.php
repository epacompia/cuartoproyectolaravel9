<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');

            $table->text('summary');


            $table->longText('content');
            $table->string('image_url')->nullable();

            $table->boolean('is_published')->default(false);

            //LLAVES FORANEAS
            $table->foreignId('category_id')->constrained();
            $table->foreignId('user_id')->constrained();

            $table->timestamp('published_at')->nullable(); //para saber la fecha y hora donde se publican los articulos
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
