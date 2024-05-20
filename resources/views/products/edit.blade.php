{{-- Se cambia el layout por el componente de laravel creado por breeze --}}
<x-app-layout>

{{-- @section('content') --}}

<div class="flex justify-center mt-3">
    <div class="w-full md:w-1/3">

        @session('success')
            <div class="bg-green-100 text-green-800 p-3 rounded mb-4" role="alert">
                {{ $value }}
            </div>
        @endsession

        <div class="bg-white shadow-md rounded">
            <div class="bg-gray-200 px-4 py-2 flex justify-between items-center">
                <div class="font-semibold">
                    Editar Producto
                </div>
                <div>
                    <a href="{{ route('products.index') }}" class="inline-block bg-blue-500 text-white px-3 py-1 rounded text-sm hover:bg-blue-600">&larr; Atrás</a>
                </div>
            </div>
            <div class="p-4">
                <form action="{{ route('products.update', $product->id) }}" method="post" class="flex flex-col items-center">
                    @csrf
                    @method("PUT")

                    <div class="mb-4 w-full">
                        <x-input-label for="code">Código</x-input-label>
                        <x-text-input id="code" name="code" value="{{ $product->code }}" class="w-full"/>
                        @error('code')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4 w-full">
                        <x-input-label for="name">Nombre</x-input-label>
                        <x-text-input id="name" name="name" value="{{ $product->name }}" class="w-full"/>
                        @error('name')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4 w-full">
                        <x-input-label for="quantity">Cantidad</x-input-label>
                        <x-text-input id="quantity" type="number" name="quantity" value="{{ $product->quantity }}" class="w-full"/>
                        @error('quantity')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4 w-full">
                        <x-input-label for="price">Precio</x-input-label>
                        <x-text-input id="price" type="number" step="0.01" name="price" value="{{ $product->price }}" class="w-full"/>
                        @error('price')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4 w-full">
                        <x-input-label for="description">Descripción</x-input-label>
                        <textarea id="description" name="description" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full @error('description') border-red-500 @enderror">{{ $product->description }}</textarea>
                        @error('description')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="mb-4 w-full flex justify-center">
                        <x-primary-button>Actualizar</x-primary-button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>    
</div>

    
</x-app-layout>
