<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    public function autor(){ //$noticia->autor-->nombre
        return $this->belongsTo(Autor::class); //Pertenece a un autor
    }

    public function categorias(){
        return $this->belongsToMany(Categoria::class); // Modelo de muchos a muchos
    }

    use HasFactory;

    protected $fillable = [
        'titulo', 'contenido', 'imagen', 'autor_id', 'categoria_id'
    ];
}
