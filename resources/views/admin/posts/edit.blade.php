<x-admin-layout>
    <form action="{{route('admin.posts.update', $post)}}" method="POST">
    @csrf
    @method('PUT')

    <div class="bg-white rounded-lg shadow p-6">
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
            <textarea class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full" name="summary" id="" rows="4" ></textarea>
        </div>
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
