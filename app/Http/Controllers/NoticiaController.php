<?php

namespace App\Http\Controllers;

use App\Models\AutorNoticia;
use App\Models\CategoriaNoticia;
use App\Models\Noticia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class NoticiaController extends Controller
{
    // He dejado los métodos abiertos, sin autentificación
    // En caso de querer limitar alguno, quitarlo de 'except'
    public function __construct(){
        $this->middleware('auth', ['except' => ['index', 'create', 'store', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Obtener todas las noticias
        $noticias = Noticia::all(['id', 'titulo', 'contenido', 'imagen', 'autor_id', 'categoria_id']);
        return view('noticias.index')->with(('noticias'), $noticias);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Obtener las categorías y autores (sin modelo)
        //$categorias = DB::table('categoria_noticias')->get()->pluck('nombre', 'id');
        //$autores = DB::table('autor_noticias')->get()->pluck('nombre', 'id');

        // Con modelo
        $categorias = CategoriaNoticia::all(['id', 'nombre']);
        $autores = AutorNoticia::all(['id', 'nombre']);
        return view('noticias.create')->with(('categorias'), $categorias)->with(('autores'), $autores);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validación del formuluario para crear noticias
        $data = request()->validate([
            'titulo' => 'required|max:255',
            'categoria' => 'required',
            'contenido' => 'required',
            'autor' => 'required',
            'imagen' => 'required|image'
        ]);

        // Obtener la ruta de la arpeta del servidor dónde se almacenan las imágenes
        $ruta_imagen = $request['imagen']->store('upload-noticias', 'public');

        // Resize de la imagen (efecto fit)
        $img = Image::make( public_path("storage/{$ruta_imagen}"))->fit(1000, 550);
        $img->save();

        // Almacenar datos introduucidos en el formulario en la bbdd
        DB::table('noticias')->insert([
            'titulo' => $data['titulo'],
            'contenido' => $data['contenido'],
            'imagen' => $ruta_imagen,
            'autor_id' => $data['autor'],
            'categoria_id' => $data['categoria'],
         ]);

        // Redireccionar una vez se ha hecho "submit" del formulario
        return redirect()->action('App\Http\Controllers\NoticiaController@index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function show(Noticia $noticia)
    {
        return view('noticias.show', compact('noticia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function edit(Noticia $noticia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Noticia $noticia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Noticia $noticia)
    {
        //
    }
}
