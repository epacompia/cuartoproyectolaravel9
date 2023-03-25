<?php

namespace App\Observers;
use App\Models\Post;
use Illuminate\Support\Str;

class PostObserver
{


    //se puede contenplar para la creacion dos casos usar create o creating , yo uso create que es la aacion que se desencadena despues que el post se creo
    //mientras que creating es la accion que se va desencadenar justo antes de que el post se cree
    //ESTO USO PORQUE QUIERO QUE SE USE ANTES QUE EL POST SE CREE
    public function creating(Post $post){
        //aqui en esta condicion coloco el ! para que me evalue que si no se esta ejecutando en la consola  no lo tome
        if (!app()->runningInConsole()) {   //esto returna un true si algo se ejecuta desde la consola
            //$post->slug=Str::slug($post->title); //No le pedire que me genere slug automaticos porque puede duplicarse
            $post->user_id =auth()->id();
        }

    }
}
