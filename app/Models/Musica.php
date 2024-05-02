<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Musica extends Model
{
    use HasFactory;

    protected $table = "musicas";
    //app/Models/
    protected $fillable = [
        "usuario",
        "nmusica",
        "artista",
        "ano",
        "link",
        "categoria_id",

    ];

    protected $casts = [
        'categoria_id'=>'integer'
    ];

    public function categoria(){

        return $this->belongsTo(Categoria::class, 'categoria_id');
    }
}
