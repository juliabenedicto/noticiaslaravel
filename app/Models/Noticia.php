<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    use HasFactory;

    // Campos que se agregan
    public $fillable = [
        'titulo',
        'contenido',
        'imagen',
        'autor_id',
        'categoria_id'
    ];

    // Obtener el autor de la noticia vía Foreign Key
    public function autor(){
        return $this->belongsTo(AutorNoticia::class);
    }
    // Obtener la categoría de la noticia vía Foreign Key
    public function categoria(){
        return $this->belongsTo(CategoriaNoticia::class);
    }
}
