<x-admin-layout>

    <div  class="flex justify-end mb-6">
        <a href="{{route('admin.posts.create')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Nuevo
        </a>
    </div>


    <ul class="space-y-8">
        @foreach ($posts as $post)
        <li class="grid grid-cols-1 md:grid-cols-2 gap-4 lg:gap-6">
            <figure>
                <a href="{{route('admin.posts.edit',$post)}}">
                    <img class="aspect-[16/9] object-cover object-center w-full" src="{{$post->image}}" alt="{{$post->title}}">
                </a>
            </figure>
            <div class="text-xl font-semibold">
                <h1>
                    <a href="{{route('admin.posts.edit',$post)}}">
                        {{$post->title}}
                    </a>
                </h1>
                <hr class="mt-1 mb-2">

                <span @class([
                    'bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300' => $post->is_published,
                    'bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300' => !$post->is_published,
                ])>
                {{$post->is_published ? 'Publicado' :'Sin publicar'}}
                </span>
                <p class="mt-2 mb-4">
                    {{Str::limit($post->summary, 80)}}
                </p>

                <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded " href="{{route('admin.posts.edit', $post)}}">Editar</a>
            </div>
        </li>
        @endforeach
    </ul>


    {{-- PAGINANDO LOS RESULTADOS --}}
    <div class="mt-4">
        {{$posts->links()}}
    </div>
</x-admin-layout>
