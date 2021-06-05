
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
                <th scole="col">Categoría</th>
                <th scole="col">Acciones</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>Noticia 1</td>
                <td>Deportes</td>
                <td>

                </td>
            </tr>
        </tbody>
    </table>
</div>

@endsection

