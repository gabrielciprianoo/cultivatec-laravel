@extends('layouts.app')

@section('content')
    <section class="container mx-auto flex flex-col gap-4 py-6 px-6 md:px-0">
        <h2 class="text-3xl text-green-700 text-center">¿Quiénes Somos?</h2>
        <p class="text-lg">
            Bienvenido a Cultivando-teC, una herramienta creada con la finalidad
            de brindar información a aquel las personas involucradas en las actividades
            de la cadena de producción primaria, principalmente del sector agrícola,
            los cuales buscan comercializar sus productos y no saben por dónde comenzar.
        </p>
        <p class="text-lg">
            Como se sabe, dentro de la industria de los alimentos, se deben llevar a
            cabo procedimientos que garanticen la calidad e inocuidad de los productos
            que se destinarán para el consumo humano, esto llevando a cabo los
            procedimientos pertinentes desde la obtención de las materias primas,
            hasta que el producto l legue a su destino para ser distribuído y
            posteriormente consumido. Además, se deben de seguir rigurosos
            lineamientos que se encuentran establecidos en función del tipo
            de alimentos, así como de los destinos a los que se dirijan,
            siendo regulados por distintas organizaciones, según sea el caso.
        </p>

        <p class="text-lg">
            En el caso del sector agrícola, es de suma importancia garantizar que los
            procesos implicados desde el cultivo hasta la cosecha, así como en el manejo
            post-cosecha, no representan riesgos fitosanitarios a los consumidores,
            ni perjudiquen o mermen procesos en algún eslabón de la cadena de
            comercialización, según sea el caso. Es por esto que existen diversos
            organismos o autoridades sanitarias que se encargan de regular y vigilar las
            condiciones bajo las que se deben regir los productores y/o comercializadores
            de productos provenientes de las prácticas agrícolas, y así reducir al máximo
            los riesgos sanitarios que pudieran presentarse en las labores del rubro,
            optimizando los factores que inhiben su desarrollo y potenciando el alcance
            de los productos agrícolas en distintos ámbitos.
        </p>

        <p class="text-lg">
            El implementar sistemas que garanticen la calidad e inocuidad de los
            productos agrícolas puede repercutir de varias maneras, según los objetivos
            que se quieran alcanzar, entre el los encontramos:
        </p>
    </section>

    <section>
        <div class="max-w-5xl mx-auto px-4 grid grid-cols-1 gap-8 lg:grid-cols-2 my-10">
            <div class="bg-orange-600 flex items-center justify-start gap-4 p-4 rounded-2xl">
    
                <img class="w-16 h-16" src="{{ asset('img/icono_dinero.svg') }}" alt="icono dinero">
                <p class="text-white text-2xl">Disminuir los costos</p>
    
            </div>
    
            <div class="bg-orange-600 flex items-center justify-start gap-4 p-4 rounded-2xl">
    
                <img class="w-16 h-16" src="{{ asset('img/icono_lista.svg') }}" alt="icono lista">
                <p class="text-white text-2xl">Cumplir con las especificaciones</p>
    
            </div>
    
            <div class="bg-orange-600 flex items-center justify-start gap-4 p-4 rounded-2xl">
    
                <img class="w-16 h-16" src="{{ asset('img/icono_salud.svg') }}" alt="icono salud">
                <p class="text-white text-2xl">Proteger la salud publica</p>
    
            </div>
    
            <div class="bg-orange-600 flex items-center justify-start gap-4 p-4 rounded-2xl">
    
                <img class="w-16 h-16" src="{{ asset('img/icono_check.svg') }}" alt="icono check">
                <p class="text-white text-2xl">Mayor eficiencia en el comercio</p>
    
            </div>
    
            <div class="bg-orange-600 flex items-center justify-start gap-4 p-4 rounded-2xl">
    
                <img class="w-16 h-16" src="{{ asset('img/icono_caja.svg') }}" alt="icono caja">
                <p class="text-white text-2xl">Transparencia en el comercio</p>
    
            </div>
    
            <div class="bg-orange-600 flex items-center justify-start gap-4 p-4 rounded-2xl">
    
                <img class="w-16 h-16" src="{{ asset('img/icono_medalla.svg') }}" alt="icono medalla">
                <p class="text-white text-2xl">Garantizar la calidad</p>
    
            </div>
        </div>
    </section>

    <section class="container mx-auto flex flex-col gap-4 py-6 px-6 md:px-0">
        <p class="text-lg">
            Pese a que en cualquier parte del mundo los objetivos en cuanto a la materia 
            de al imentación respecta son simi lares y buscan garanti zar la fitosanidad,
            las legislaciones o los requerimientos que se establecen para la 
            comercialización de al imentos de origen agrícola son distintos, 
            y se encuentran variantes debido a las distintas agencias y departamentos 
            encargados de la protección de la salud pública a través de los estándares 
            de calidad, así como de otros intereses implicados a través del comercio.

            Aquí encontrarás la información necesaria para llevar a cabo los 
            procedimientos pertinentes que aseguren la satisfacción bilateral del 
            comercio, así como lo necesario para garantizar la inocuidad de los 
            productos de acuerdo a las legislaciones de cada destino.

        </p>
        <p class="text-lg">
            A continuación, selecciona el alimento de tu interés, e indaga en información 
            sobre los lineamientos que rigen su cadena de producción, así como los 
            requisitos legales y recomendaciones que te ayudarán a optimizar tu proceso 
            y a obtener las características de calidad e inocuidad indispensables para 
            su comercialización, ya sea a través del comercio interior o exterior.
        </p> 
    </section>

    <section>
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3 p-4 my-20 container mx-auto">
            @foreach ($fruits as $fruit )
                <a  href="{{route('fruit.show', $fruit)}}" class=" p-4 border-b border-green-700 flex flex-col items-center justify-center">
                    <img class="w-80" src="{{ asset('uploads/' . $fruit->image) }}" alt="Imagen de {{ $fruit->name }}">
                    <h3 class="text-center text-xl">{{$fruit->name}}</h3>
                </a>
            @endforeach

        </div>
    </section>
    
    
@endsection
