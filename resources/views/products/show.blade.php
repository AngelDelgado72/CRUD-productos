{{-- Se cambia el layout por el componente de laravel creado por breeze --}}
<x-app-layout>

<div class="flex justify-center mt-3">
    <div class="w-full md:w-1/3">

        <div class="bg-white shadow-md rounded">
            <div class="bg-gray-200 px-4 py-2 flex justify-between items-center">
                <div class="font-semibold">
                    Información del Producto
                </div>
                <div>
                    <a href="{{ route('products.index') }}" class="inline-block bg-blue-500 text-white px-3 py-1 rounded text-sm hover:bg-blue-600">&larr; Atrás</a>
                </div>
            </div>
            <div class="p-4">

                <div class="mb-4 w-full">
                    <x-input-label for="code">Código</x-input-label>
                    <x-text-input id="code" name="code" value="{{ $product->code }}" disabled class="w-full"/>
                </div>

                <div class="mb-4 w-full">
                    <x-input-label for="name">Nombre</x-input-label>
                    <x-text-input id="name" name="name" value="{{ $product->name }}" disabled class="w-full"/>
                </div>

                <div class="mb-4 w-full">
                    <x-input-label for="quantity">Cantidad</x-input-label>
                    <x-text-input id="quantity" type="number" name="quantity" value="{{ $product->quantity }}" disabled class="w-full"/>
                </div>

                <div class="mb-4 w-full">
                    <x-input-label for="price">Precio</x-input-label>
                    <x-text-input id="price" type="number" step="0.01" name="price" value="{{ $product->price }}" disabled class="w-full"/>
                </div>

                <div class="mb-4 w-full">
                    <x-input-label for="description">Descripción</x-input-label>
                    <textarea id="description" name="description" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full" disabled>{{ $product->description }}</textarea>
                </div>

            </div>
        </div>
    </div>    
</div>


    
</x-app-layout>
