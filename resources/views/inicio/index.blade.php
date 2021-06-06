@extends('layouts.app')

@section('styles')

@endsection

@section('content')

<div class="d-flex flex-column">
    <a href="/noticias" class="btn btn-primary mt-3">Administrar Noticias</a>
    <a href="/noticias/create" class="btn btn-primary mt-3">Crear Noticia</a>
</div>

<div class="d-flex flex-column">
<a href="/api/noticias" class="btn btn-success mt-3">API Noticias + {página}</a>
<a href="/api/noticia/1" class="btn btn-success mt-3">API Noticia + {id}</a>
<a href="/api/categoria/1" class="btn btn-success mt-3">API Categoría + {id} + {página}</a>
<a href="/api/autor/1" class="btn btn-success mt-3">API Autor + {id} + {página}</a>
</div>



@endsection
