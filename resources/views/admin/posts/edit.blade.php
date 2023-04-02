<x-admin-layout>
    @push('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @endpush





    <form action="{{route('admin.posts.update', $post)}}" method="POST">
    @csrf
    @method('PUT')

    <div class="bg-white rounded-lg shadow p-6">
        {{-- esto es para que se muestre los errores de validacion --}}
        <x-validation-errors class="mb-4" />


        <div class="mb-4">
            <x-label>Titulo</x-label>
            <x-input type="text" name="title" id="title"  onkeyup="string_to_slug()" class="w-full" value="{{old('title',$post->title)}}"></x-input>
        </div>
        <div class="mb-4">
            <x-label for="slug">
                Slug
            </x-label>
            <x-input type="text" class="w-full"   name="slug" id="slug"  value="{{ old('slug', $post->slug) }}" />
        </div>
        <div class="mb-4">
            <x-label for="category">
                Categoria
            </x-label>
            <select name="category_id" id="category"
                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @selected(old('category_id',$post->category_id) == $category->id)>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>

        </div>
        <div class="mb-4">
            <x-label for="summary">
                Resumen
            </x-label>
            <textarea class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full" name="summary" id="" rows="4" >{{old('summary',$post->summary)}}</textarea>
        </div>

        <div class="mb-4">
            <x-label>
                Etiquetas
            </x-label>
            <select class="js-example-basic-multiple w-full" name="tags[]" multiple="multiple">
                {{-- @foreach ($tags as $tag )
                    <option value="{{$tag->id}}"  @selected($post->tags->contains($tag))>{{$tag->name}}</option>
                @endforeach --}}

                @foreach ($post->tags as $tag)
                    <option value="{{$tag->name}}" selected>{{$tag->name}}</option>
                @endforeach
            </select>

        </div>


        <div class="mb-4">
            <x-label>
                Contenido
            </x-label>
            <textarea  id="editor" name="content" rows="4" >{{old('content',$post->content)}}</textarea>
        </div>

        <div class="mb-4">
            
            <input type="hidden" name="is_published" value="0">  <!--ESTO ES EN CASO NO ME TOME EL VALOR DE 1 EN EL quieres publicar post que esta abajo de esta linea-->
            <label class="relative inline-flex items-center cursor-pointer">
            <input type="checkbox" value="1" name="is_published"  @checked(old('is_published', $post->is_published)==1) class="sr-only peer">
            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
            <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">¿Quieres publicar Post?</span>
            </label>
        </div>


        <div class="flex justify-end">
            <x-button>
                Actualizar post
            </x-button>
        </div>

    </div>
    </form>


@push('js')

    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
    <script>
        function string_to_slug() {

            title = document.getElementById("title").value;
            title = title.replace(/^\s+|\s+$/g, '');
            title = title.toLowerCase();
            var from = "àáäâèéëêìíïîòóöôùúüûñç·/_,:;";
            var to = "aaaaeeeeiiiioooouuuunc------";
            for (var i = 0, l = from.length; i < l; i++) {
                title = title.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
            }
            title = title.replace(/[^a-z0-9 -]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-');

            document.getElementById('slug').value = title;

        }



         ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );


        //AJAX PARA MOSTRAR LAS ETIQUETAS
        $(document).ready(function() {
        $('.js-example-basic-multiple').select2({
            tags: true,
            tokenSeparators: [',',''],
            ajax:{
                url:"{{route('tags.select2')}}",
                dataType:'json',
                delay:250,
                data: function(params){
                    return {
                        term: params.term
                    }
                },

                processResults: function(data){
                    return {
                        results: data
                    }
                },
            }
        });
        });

    </script>

@endpush

</x-admin-layout>
