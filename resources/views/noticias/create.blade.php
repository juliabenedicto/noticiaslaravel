
@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css" integrity="sha512-CWdvnJD7uGtuypLLe5rLU3eUAkbzBR3Bm1SFPEaRfvXXI2v2H5Y0057EMTzNuGGRIznt8+128QIDQ8RqmHbAdg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('botones')

<a href="{{ route('noticias.index') }}" class="btn btn-primary mr-2 text-white">Volver</a>

@endsection

@section('content')

<h2 class="text-center mb-5">Crear nueva noticia</h2>

<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <form method="POST" action="{{ route('noticias.store') }}" enctype="multipart/form-data" novalidate>
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
                <label for="autor">Autor/a</label>
                <select name="autor" class="form-control @error('autor') is-invalid @enderror" id="autor">
                   <option value="">-- Selecciona --</option>
                    @foreach($autores as $autor)
                    <option value="{{$autor->id}}" {{ old('autor') == $autor->id ? 'selected' : '' }}>{{$autor->nombre}}</option>
                    @endforeach
                </select>
                    @error('autor')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                        </span>
                        @enderror
            </div>


            <div class="form-group">
                <label for="categoria">Categoría</label>
                <select name="categoria" class="form-control @error('categoria') is-invalid @enderror" id="categoria">
                   <option value="">-- Selecciona --</option>
                    @foreach($categorias as $categoria)
                    <option value="{{$categoria->id}}" {{ old('categoria') == $categoria->id ? 'selected' : '' }}>{{$categoria->nombre}}</option>
                    @endforeach
                </select>
                    @error('categoria')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                        </span>
                        @enderror
            </div>

            <div class="form-group mt-3">
                <label for="contenido">Contenido</label>
                <input type="hidden" id="contenido" name="contenido" value="{{old('contenido')}}">
                <trix-editor input='contenido' class="form-control @error('contenido') is-invalid @enderror"></trix-editor>
                @error('contenido')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                        </span>
                        @enderror
            </div>

            <div class="form-group mt-3">
                <label for="imagen">Elige la imagen</label>
                    <input type="file" class="form-control @error('imagen') is-invalid @enderror" id="imagen" name="imagen">
                    @error('imagen')
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

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js" integrity="sha512-/1nVu72YEESEbcmhE/EvjH/RxTg62EKvYWLG3NdeZibTCuEtW5M4z3aypcvsoZw03FAopi94y04GhuqRU9p+CQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection

