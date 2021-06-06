<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function index(){

        // Obtener las últimas 5 noticias creadas
        $nuevas = Noticia::latest()->take(5)->get();

        return view('inicio.index', compact('nuevas'));
    }
}
