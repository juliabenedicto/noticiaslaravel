
@extends('layouts.app')

@section('botones')

<a href="{{ route('noticias.index') }}" class="btn btn-primary mr-2 text-white">Volver</a>

@endsection

@section('content')

<h2 class="text-center mb-5">Crear nueva noticia</h2>

<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <form method="POST" action="{{ route('noticias.store') }}" novalidate>
            @csrf
            <div class="form-group">
                <label for="titulo">Título Noticia</label>
                <input type="text" name="titulo" class="form-control @error('titulo') is-invalid @enderror" id="titulo" placeholder="Título Noticia" value={{ old ('titulo') }}>
                @error('titulo')
                <span class="invalid-feedback d-block" role="alert">
                <strong>{{$message}}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Agregar Noticia">
            </div>

        </form>
    </div>
</div>

@endsection
