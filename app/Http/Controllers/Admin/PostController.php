<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;



class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //return auth()->user();
        $posts=Post::where('user_id', auth()->id())
                        ->orderBy('id', 'desc')
                        ->paginate(5); //aqui le digo que retorne los registros del usuario autenticado
        //return $posts;
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        return view('admin.posts.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' =>'required|string|max:255',
            'category_id' =>'required|integer|exists:categories,id',
            'slug' => 'required|string|max:255|unique:posts',
        ]);


/*FORMA 1
        $post=Post::create([
            'title'=>$request->title,
            //'slug' =>Str::slug($request->title), //Lo comento ya que lo tengo este campo en los observer
            'category_id'=>$request->category_id,
            //'user_id'=>auth()->id(), //tambien usado ya en el observer
        ]);

*/

//FORMA 2
        $post=Post::create($request->all());  //AQUI GUARDO MI RGISTRO MAS FACIL ya que tengo mi observer creado


        //aqui estoy es para implementar un banner pra que aparesca cuando se guarde el registro
        session()->flash('flash.banner', 'El Post se ha creado con exito');
        session()->flash('flash.bannerStyle', 'success');


        return redirect()->route('admin.posts.edit',$post);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
