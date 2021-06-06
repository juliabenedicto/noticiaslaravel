
@extends('layouts.app')

@section('botones')

<a href="{{ route('noticias.create') }}" class="btn btn-primary mr-2 text-white">Crear Noticia</a>

@endsection

@section('content')

<h2 class="text-center mb-5">Administrar noticias</h2>

<div class="col-md-10 mx-auto bg-white p-3">
    <table class="table">
        <thead class="bg-primary text-light">
            <tr>
                <th scole="col">Título</th>
                <th scole="col">Autor/a</th>
                <th scole="col">Categoría</th>
                <th scole="col">Acciones</th>
            </tr>
        </thead>


        <tbody>
            @foreach($noticias as $noticia)
            <tr>
                <td>{{$noticia->titulo}}</td>
                <td>{{$noticia->autor->nombre}}</td>
                <td>{{$noticia->categoria->nombre}}</td>
                <td>
                    <a href="" class="btn btn-danger mr-1">Eliminar</a>
                    <a href="" class="btn btn-dark mr-1">Editar</a>
                    <a href="{{route('noticias.show', ['noticia'=>$noticia->id])}}" class="btn btn-success mr-1">Ver</a>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

