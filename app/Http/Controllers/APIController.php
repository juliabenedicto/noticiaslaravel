<?php

namespace App\Http\Controllers;

use App\Models\AutorNoticia;
use App\Models\CategoriaNoticia;
use App\Models\Noticia;
use Illuminate\Http\Request;

class APIController extends Controller
{
    // Método para obtener todas las noticias (OK)
    public function noticias(){
        $noticias = Noticia::all();
        return response()->json($noticias);
    }

    // Método para mostrar una noticia en específico (con su id) (OK)
    public function show(Noticia $noticia){
        return response()->json($noticia);
    }

    // Método para obtener todas las categorías (OK)
    public function categorias(){
        $categorias = CategoriaNoticia::all();
        return response()->json($categorias);
    }

    // Método para obtener las noticias de una categoría (OK)
    public function categoria(CategoriaNoticia $categoria){
        $noticias = Noticia::where('categoria_id', $categoria->id)->get(['id', 'titulo', 'created_at']);
        return response()->json($noticias);
    }

    // Método para obtener las noticias de un autor/a (OK)
    public function autor(AutorNoticia $autor){
        $noticias = Noticia::where('autor_id', $autor->id)->get(['id', 'titulo', 'created_at']);
        return response()->json($noticias);
    }

}
