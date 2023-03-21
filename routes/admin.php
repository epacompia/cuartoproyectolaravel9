<?php

use App\Http\Controllers\Admin\PostController;
use Illuminate\Support\Facades\Route;


Route::get('/', function(){
    return view('admin.dashboard');
})->name('dashboard');  //AQUI AGREGO MIDDLEWARE PARA PROTEGER LA RUTA QUE NADIE QUE NO ESTE AUTENTICADO ACCEDA POR ESO PONGO auth


Route::resource('posts', PostController::class);
