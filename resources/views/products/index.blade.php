{{-- Se cambia el layout por el componente de laravel creado por breeze --}}
<x-app-layout>

{{-- @section('content') --}}

<div class="flex justify-center mt-3">
    <div class="w-full md:w-full">

        
        @session('success')
            <div class="bg-green-100 text-green-800 p-3 rounded mb-4 text-center" role="alert">
                {{ $value }}
            </div>
        @endsession

        <div class="bg-white shadow-md rounded-lg p-3 m-5">
            <div class="bg-gray-200 px-4 py-2 font-semibold rounded-md">Lista de productos</div>
            <div class="p-4">
                <a href="{{ route('products.create') }}" class="inline-block bg-green-500 text-white px-3 py-1 rounded text-sm my-2 hover:bg-green-600"><i class="bi bi-plus-circle"></i>Añadir nuevo producto</a>
                <table class="min-w-full bg-white border border-gray-300">
                    <thead>
                    <tr>
                        <th scope="col" class="border border-gray-300 px-4 py-2">#</th>
                        <th scope="col" class="border border-gray-300 px-4 py-2">Código</th>
                        <th scope="col" class="border border-gray-300 px-4 py-2">Nombre</th>
                        <th scope="col" class="border border-gray-300 px-4 py-2">Cantidad</th>
                        <th scope="col" class="border border-gray-300 px-4 py-2">Precio</th>
                        <th scope="col" class="border border-gray-300 px-4 py-2">Acción</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                        <tr>
                            <th scope="row" class="border border-gray-300 px-4 py-2">{{ $loop->iteration }}</th>
                            <td class="border border-gray-300 px-4 py-2">{{ $product->code }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $product->name }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $product->quantity }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $product->price }}</td>
                            <td class="border border-gray-300 px-4 py-2">
                                <form action="{{ route('products.destroy', $product->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <a href="{{ route('products.show', $product->id) }}" class="inline-block bg-yellow-500 text-white px-3 py-1 rounded text-sm mr-2 hover:bg-yellow-600"><i class="bi bi-eye"></i> Ver</a>

                                    <a href="{{ route('products.edit', $product->id) }}" class="inline-block bg-blue-500 text-white px-3 py-1 rounded text-sm mr-2 hover:bg-blue-600"><i class="bi bi-pencil-square"></i> Editar</a>   

                                    <button type="submit" class="inline-block bg-red-500 text-white px-3 py-1 rounded text-sm hover:bg-red-600" onclick="return confirm('¿Estás seguro de querer eliminar este registro?')"><i class="bi bi-trash"></i> Borrar</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="border border-gray-300 px-4 py-2 text-center">
                                    <span class="text-red-500">
                                        <strong>No se encontraron registros</strong>
                                    </span>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                {{-- {{ $products->links() }} --}}

                <div class="mt-10">
                    {{ $products->links() }}
                </div>

            </div>
        </div>
    </div>    
</div>

    
</x-app-layout>
