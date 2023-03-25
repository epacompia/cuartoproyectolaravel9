<x-admin-layout>
    <h1 class="text-3xl font-semibold mb-2">Nuevo articulo</h1>
    <form class="bg-white rounded-lg p-6 shadow-lg" action="{{ route('admin.posts.store') }}" method="POST">
        @csrf


        <div class="mb-4">
            <x-label for="title">
                Titulo
            </x-label>
            <x-input type="text" class="w-full" name="title"  onkeyup="string_to_slug()" id="title" placeholder="Ingrese un nombre por favor"
                value="{{ old('title') }}" />
            <x-input-error for="title" />
        </div>

        <div class="mb-4">
            <x-label for="slug">
                Slug
            </x-label>
            <x-input type="text" class="w-full"   name="slug" id="slug" placeholder="Ingrese un slug por favor"
                value="{{ old('slug') }}" />
            <x-input-error for="slug" />
        </div>


        <div class="mb-4">
            <x-label for="category">
                Categoria
            </x-label>
            <select name="category_id" id="category"
                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>

        </div>

        <div>
            <x-button class="flex justify-start">
                Crear post
            </x-button>
        </div>


    </form>

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
    </script>
</x-admin-layout>
