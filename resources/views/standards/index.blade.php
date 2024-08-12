@extends('layouts.app')

@section('content')
    <main class="container mx-auto">
        <h1 class="text-4xl my-10 text-green-700 text-center">Normas de {{ $fruit->name}}</h1>
        <a href="{{ route('fruit.index') }}" class="bg-green-500 my-16 p-3 text-white mb-20 mr-10">Regresar</a>
        <a href="{{ route('standards.create', $fruit) }}" class="bg-green-500 my-16 p-3 text-white mb-20">Nueva Norma</a>
        @if (session('message'))
            <p class="bg-green-800 text-white max-w-2xl uppercase mx-auto rounded-lg text-sm my-16 p-2 text-center">
                {{ session('message') }}</p>
        @endif

        <div class="overflow-x-auto mt-20">
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="py-2 px-4 bg-orange-600 text-left  text-white text-sm uppercase font-bold">ID</th>
                        <th class="py-2 px-4 bg-orange-600 text-left  text-white text-sm uppercase font-bold">Nombre</th>
                        <th class="py-2 px-4 bg-orange-600 text-center text-white text-sm uppercase font-bold">Link</th>
                        <th class="py-2 px-4 bg-orange-600 text-center text-white text-sm uppercase font-bold">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($standards as $standard)
                        <tr class="border-b border-gray-200">
                            <td class="py-6 px-4 text-lg uppercase ">{{ $standard->id }}</td>
                            <td class="py-6 px-4 text-lg uppercase ">{{ $standard->short_name }}</td>
                            <td class="py-6 px-4 flex justify-center">
                                
                                <a class="text-blue-600" target="blank" href="{{$standard->link}}">Link oficial</a>
                            </td>
                            <td class="py-6 px-4 text-sm">
                                <div class="flex space-x-2 justify-center">
                                    <a href="{{route('standards.edit',[$fruit,$standard] )}}"
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">Editar</a>
                                    <form action="{{route('standards.delete', [$standard, $fruit])}}" method="POST"
                                        onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta norma?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">Eliminar</button>
                                    </form>
                                    
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Mostrar enlaces de paginación -->
            <div class="mt-6">
                {{ $standards->links() }}
            </div>
        </div>
    </main>
@endsection
