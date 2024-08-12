@extends('layouts.app')

@section('content')
    <main class="container mx-auto">
        <h1 class="text-4xl my-10 text-green-700 text-center">Agregar Nueva Norma para {{ $fruit->name }}</h1>
        <a href="{{ route('standards.index', $fruit) }}" class="bg-green-500 p-3 text-white mb-10 inline-block">Regresar</a>

        <div class="max-w-xl mx-auto my-20 bg-gray-100 rounded-md shadow p-6">
            @if (session('message'))
                <p class="bg-green-800 text-white max-w-2xl uppercase mx-auto rounded-lg text-sm my-16 p-2 text-center">
                    {{ session('message') }}</p>
            @endif

            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{route('standards.store', $fruit)}}" method="POST">
                @csrf

                <!-- Campo de nombre corto -->
                <div class="mb-5">
                    <label for="short_name" class="block text-lg">Nombre Corto:</label>
                    <input type="text" name="short_name" class="rounded-md p-2 w-full" placeholder="ej. -CODEX STAN 197-1995" value="{{ old('short_name') }}">
                    @error('short_name')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Campo de nombre largo -->
                <div class="mb-5">
                    <label for="long_name" class="block text-lg">Nombre Largo:</label>
                    <input type="text" name="long_name" class="rounded-md p-2 w-full" placeholder="ej: MODIFICACIÓN de la Norma Oficial..." value="{{ old('long_name') }}">
                    @error('long_name')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Campo de contenido -->
                <div class="mb-5">
                    <label for="content" class="block text-lg">Contenido:</label>
                    <textarea name="content" rows="5" class="rounded-md p-2 w-full" placeholder="Describa el contenido de la norma...">{{ old('content') }}</textarea>
                    @error('content')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Campo de link -->
                <div class="mb-5">
                    <label for="link" class="block text-lg">Link:</label>
                    <input type="text" name="link" class="rounded-md p-2 w-full" placeholder="ej: http://norma.org" value="{{ old('link') }}">
                    @error('link')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Select de caracter -->
                <div class="mb-5">
                    <label for="charter_id" class="block text-lg">Carácter:</label>
                    <select name="charter_id" class="rounded-md p-2 w-full">
                        <option value="">--Seleccionar--</option>
                        @foreach ($characters as $character)
                            <option value="{{ $character->id }}" {{ old('charter_id') == $character->id ? 'selected' : '' }}>
                                {{ $character->type }}
                            </option>
                        @endforeach
                    </select>
                    @error('charter_id')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Select de tipo de comercio -->
                <div class="mb-5">
                    <label for="business_id" class="block text-lg">Tipo de Comercio:</label>
                    <select name="business_id" class="rounded-md p-2 w-full">
                        <option value="">--Seleccionar--</option>
                        @foreach ($businesses as $business)
                            <option value="{{ $business->id }}" {{ old('business_id') == $business->id ? 'selected' : '' }}>
                                {{ $business->type }}
                            </option>
                        @endforeach
                    </select>
                    @error('business_id')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <input type="submit" value="Agregar Norma" class="text-white p-4 uppercase mt-4 bg-orange-600 hover:cursor-pointer hover:bg-orange-800 transition-colors rounded-md w-full">
            </form>
        </div>
    </main>
@endsection
