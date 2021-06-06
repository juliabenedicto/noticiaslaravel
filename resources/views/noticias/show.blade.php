@extends('layouts.app')

@section('content')

<article class="contenido-noticia">
    <h1 class="text-center mb-4">{{$noticia->titulo}}</h1>

    <div class="imagen-noticia">
        <img src="/storage/{{$noticia->imagen}}" class="w-100">
    </div>

    <div class="noticia-meta mt-2">
        <p>
            <span class="font-weight-bold text-primary">Escrita por</span>
            {{$noticia->autor->nombre}}
            <span class="font-weight-bold text-primary">en la categoría </span>
            {{$noticia->categoria->nombre}}
        </p>
        <p>
            <span class="font-weight-bold text-primary">Fecha: </span>
            {{$noticia->created_at}}
        </p>
        <div class="contenido">
            <h2 class="my-3 text-primary">Contenido</h2>
           {{-- Con los "!!" podemos introducir el código html que viene del editor del formulario--}}
            {!! $noticia->contenido !!}
        </div>

    </div>
</article>
@endsection
