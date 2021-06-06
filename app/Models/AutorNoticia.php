<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AutorNoticia extends Model
{
    use HasFactory;

    public $fillable = [
        'id',
        'nombre',
    ];

    // Relación 1:n para categorías y noticias
    public function noticias(){
        return $this->hasMany(Noticia::class);
    }
}
