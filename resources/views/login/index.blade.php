@extends('layouts.app')

@section('content')
    <main>
        <h1 class="text-green-600 text-3xl text-center mt-10">Iniciar Sesión</h1>
        <div class="max-w-xl mx-auto p-6 bg-gray-100 rounded shadow-md my-20">
            @if (session('message'))
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ session('message') }}</p>
            @endif
            <form action="{{ route('login')}}"  method="POST">
                @csrf
                <div class="mb-5 flex flex-col gap-4">
                    <label for="name" class="text-lg">Usuario</label>
                    <input type="text" name="name" class="rounded-md p-2" placeholder="Ingresa tu usuario" value="{{ old('name') }}">
                </div>
                <div class="mb-5 flex flex-col gap-4">
                    <label for="password" class="text-lg">Contraseña</label>
                    <input type="password" name="password" class="rounded-md p-2" placeholder="Ingresa tu password">
                </div>

                <input type="submit" value="Iniciar Sesión"
                    class="text-white
                 p-4 uppercase  mt-4 bg-orange-600 hover:cursor-pointer hover:bg-orange-800 
                 transition-colors rounded-md">
            </form>
        </div>
    </main>
@endsection
