@extends('layouts.app')

@section('content')
    <main class="container mx-auto">
        <h1 class="text-4xl my-10 text-green-700 text-center">Crear una nueva fruta</h1>
        <a href="{{ route('fruit.index') }}" class="bg-green-500 p-3 text-white">Regresar</a>

        <div class="max-w-xl mx-auto my-20 bg-gray-100 rounded-md shadow p-4">
            @if (session('message'))
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ session('message') }}</p>
            @endif

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

            <form action="{{ route('fruit.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-5 flex flex-col gap-4">
                    <label for="name" class="text-lg">Nombre</label>
                    <input type="text" name="name" class="rounded-md p-2" placeholder="Ingresa el nombre de la fruta"
                        value="{{ old('name') }}">
                    {{-- Mostrar error específico para el campo "name" --}}
                    @error('name')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-5 flex flex-col gap-4">
                    <label for="image" class="text-lg">Sube la imagen</label>
                    <input type="file" name="image" class="rounded-md p-2">
                    {{-- Mostrar error específico para el campo "image" --}}
                    @error('image')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <input type="submit" value="Crear Fruta"
                    class="text-white p-4 uppercase mt-4 bg-orange-600 hover:cursor-pointer hover:bg-orange-800 
                 transition-colors rounded-md">
            </form>
        </div>
    </main>
@endsection
