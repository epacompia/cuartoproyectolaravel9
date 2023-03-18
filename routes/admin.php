<?php
use Illuminate\Support\Facades\Route;


Route::get('/posts', function(){
    return "Hola mundo";
})->name('posts.index');  //AQUI AGREGO MIDDLEWARE PARA PROTEGER LA RUTA QUE NADIE QUE NO ESTE AUTENTICADO ACCEDA POR ESO PONGO auth
