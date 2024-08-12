@extends('layouts.app')

@section('content')
    <main class="container mx-auto">
        <h2 class="text-4xl my-10 text-center text-green-700 font-bold">Normativa y Requerimientos para Exportación e Importación de {{ $fruit->name }}</h2>

        <!-- Índice -->
        <div class="bg-gray-100 p-6 rounded-lg shadow-md">
            <h3 class="text-2xl font-semibold mb-4 text-orange-600">Índice</h3>
            <ul class="list-disc list-inside text-lg">
                <li class="seccion mb-2"><a href="#obligatorios" class="text-blue-600 hover:text-blue-800">Lineamientos de Carácter OBLIGATORIO</a></li>
                <ul class="pl-6">
                    <li class="seccion mb-1"><a href="#obNacional" class="text-blue-500 hover:text-blue-700">Comercio Nacional</a></li>
                    @foreach ($obligatorioNacional as $norma)
                        <li class="pl-4"><a href="#{{ $norma->short_name }}" class="text-gray-700 hover:text-gray-900">{{ $norma->short_name }}</a></li>
                    @endforeach
                    <li class="seccion mt-2 mb-1"><a href="#obInternacional" class="text-blue-500 hover:text-blue-700">Comercio Internacional</a></li>
                    @foreach ($obligatorioInternacional as $norma)
                        <li class="pl-4"><a href="#{{ $norma->short_name }}" class="text-gray-700 hover:text-gray-900">{{ $norma->short_name }}</a></li>
                    @endforeach
                </ul>

                <li class="seccion mt-4 mb-2"><a href="#nobligatorios" class="text-blue-600 hover:text-blue-800">Lineamientos de Carácter NO OBLIGATORIO</a></li>
                <ul class="pl-6">
                    <li class="seccion mb-1"><a href="#nobNacional" class="text-blue-500 hover:text-blue-700">Comercio Nacional</a></li>
                    @foreach ($nObligatorioNacional as $norma)
                        <li class="pl-4"><a href="#{{ $norma->short_name }}" class="text-gray-700 hover:text-gray-900">{{ $norma->short_name }}</a></li>
                    @endforeach
                    <li class="seccion mt-2 mb-1"><a href="#nobInternacional" class="text-blue-500 hover:text-blue-700">Comercio Internacional</a></li>
                    @foreach ($nObligatorioInternacional as $norma)
                        <li class="pl-4"><a href="#{{ $norma->short_name }}" class="text-gray-700 hover:text-gray-900">{{ $norma->short_name }}</a></li>
                    @endforeach
                </ul>
            </ul>
        </div>

        <!-- Contenido de las Normas -->
        <div class="contenido-normas mt-10 space-y-8">
            <!-- Lineamientos de carácter OBLIGATORIO -->
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h4 id="obligatorios" class="text-2xl font-bold text-orange-600">Lineamientos de Carácter OBLIGATORIO</h4>

                <div class="mt-6">
                    <h5 id="obNacional" class="text-xl font-semibold text-blue-500">Comercio Nacional</h5>
                    @foreach ($obligatorioNacional as $norma)
                        <div class="norma-informacion bg-gray-50 p-4 my-4 rounded-md">
                            <h6 id="{{ $norma->short_name }}" class="text-lg font-bold text-gray-700">{{ $norma->long_name }}</h6>
                            <p class="info-formateada text-gray-600 mt-2">{{ $norma->content }}</p>
                            <a target="_blank" href="{{ $norma->link }}" class="text-blue-600 hover:underline mt-2 inline-block">Ver Sitio Oficial</a>
                        </div>
                    @endforeach

                    <h5 id="obInternacional" class="text-xl font-semibold text-blue-500 mt-8">Comercio Internacional</h5>
                    @foreach ($obligatorioInternacional as $norma)
                        <div class="norma-informacion bg-gray-50 p-4 my-4 rounded-md">
                            <h6 id="{{ $norma->short_name }}" class="text-lg font-bold text-gray-700">{{ $norma->long_name }}</h6>
                            <p class="info-formateada text-gray-600 mt-2">{{ $norma->content }}</p>
                            <a target="_blank" href="{{ $norma->link }}" class="text-blue-600 hover:underline mt-2 inline-block">Ver Sitio Oficial</a>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Lineamientos de carácter NO OBLIGATORIO -->
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h4 id="nobligatorios" class="text-2xl font-bold text-orange-600">Lineamientos de Carácter NO OBLIGATORIO</h4>

                <div class="mt-6">
                    <h5 id="nobNacional" class="text-xl font-semibold text-blue-500">Comercio Nacional</h5>
                    @foreach ($nObligatorioNacional as $norma)
                        <div class="norma-informacion bg-gray-50 p-4 my-4 rounded-md">
                            <h6 id="{{ $norma->short_name }}" class="text-lg font-bold text-gray-700">{{ $norma->long_name }}</h6>
                            <p class="info-formateada text-gray-600 mt-2">{{ $norma->content }}</p>
                            <a target="_blank" href="{{ $norma->link }}" class="text-blue-600 hover:underline mt-2 inline-block">Ver Sitio Oficial</a>
                        </div>
                    @endforeach

                    <h5 id="nobInternacional" class="text-xl font-semibold text-blue-500 mt-8">Comercio Internacional</h5>
                    @foreach ($nObligatorioInternacional as $norma)
                        <div class="norma-informacion bg-gray-50 p-4 my-4 rounded-md">
                            <h6 id="{{ $norma->short_name }}" class="text-lg font-bold text-gray-700">{{ $norma->long_name }}</h6>
                            <p class="info-formateada text-gray-600 mt-2">{{ $norma->content }}</p>
                            <a target="_blank" href="{{ $norma->link }}" class="text-blue-600 hover:underline mt-2 inline-block">Ver Sitio Oficial</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
@endsection
