<x-admin-layout>
    <h1 class="text-3xl font-semibold mb-2">Nuevo articulo</h1>
    <form class="bg-white rounded-lg p-6 shadow-lg" action="{{ route('admin.posts.store') }}" method="POST">
        @csrf


        <div class="mb-4">
            <x-label for="title">
                Titulo
            </x-label>
            <x-input type="text" class="w-full" name="title" id="title"
                placeholder="Ingrese un nombre por favor" value="{{old('title')}}" />
            <x-input-error for="title" />
        </div>

        <div class="mb-4">
            <x-label for="category">
                Categoria
            </x-label>
            <select name="category_id" id="category" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @selected(old('category_id')==$category->id)>
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
</x-admin-layout>
