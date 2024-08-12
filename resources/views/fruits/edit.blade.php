@extends('layouts.app')

@section('content')
    <main class="container mx-auto">
        <h1 class="text-4xl my-10 text-green-700 text-center">Editar Fruta</h1>
        <a href="{{ route('fruit.index') }}" class="bg-green-500 p-3 text-white">Regresar</a>

        <div class="max-w-xl mx-auto my-20 bg-gray-100 rounded-md shadow p-4">
            {{-- Mostrar errores de validación --}}
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('fruit.update', $fruit) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-5 flex flex-col gap-4">
                    <label for="name" class="text-lg">Nombre</label>
                    <input type="text" name="name" class="rounded-md p-2" placeholder="Ingresa el nombre de la fruta"
                        value="{{ old('name', $fruit->name) }}">
                    @error('name')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-5 flex flex-col gap-4">
                    <label for="image" class="text-lg">Imagen Actual</label>
                    <img src="{{ asset('uploads/' . $fruit->image) }}" alt="Imagen de {{ $fruit->name }}"
                        class="w-32 h-32 object-cover rounded">

                    <label for="image" class="text-lg">Cambiar Imagen</label>
                    <input type="file" name="image" class="rounded-md p-2">
                    @error('image')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <input type="submit" value="Actualizar Fruta"
                    class="text-white p-4 uppercase mt-4 bg-orange-600 hover:cursor-pointer hover:bg-blue-800 
                 transition-colors rounded-md">
            </form>
        </div>
    </main>
@endsection
