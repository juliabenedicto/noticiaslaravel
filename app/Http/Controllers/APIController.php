<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use App\Models\AutorNoticia;
use Illuminate\Http\Request;
use App\Models\CategoriaNoticia;
use Illuminate\Support\Facades\DB;

class APIController extends Controller
{
    // Método para obtener todas las noticias, con parámetro {pagina} (OK)
    public function noticias($pagina){
        $noticias = DB::table('noticias')->select('id', 'titulo', 'created_at')->paginate(10, ['*'], 'page', $pagina);
        return $noticias;
    }

    // Método para mostrar una noticia en específico (con su id) (OK)
    public function show(Noticia $noticia){
        return $noticia;
    }

    // Método para obtener todas las categorías (OK)
    public function categorias(){
        $categorias = CategoriaNoticia::all();
        return $categorias;
    }

    // Método para obtener las noticias de una categoría (OK)
    public function categoria(CategoriaNoticia $categoria, $pagina){
        $noticias = Noticia::where('categoria_id', $categoria->id)->select('id', 'titulo', 'created_at')->paginate(10, ['*'], 'page', $pagina);
        return $noticias;
    }

    // Método para obtener las noticias de un autor/a (OK)
    public function autor(AutorNoticia $autor, $pagina){
        $noticias = Noticia::where('autor_id', $autor->id)->select('id', 'titulo', 'created_at')->paginate(10, ['*'], 'page', $pagina);
        return $noticias;
    }

}
