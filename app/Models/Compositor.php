<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compositor extends Model
{
    use HasFactory;

    protected $table = "compositor";
    //app/Models/
    protected $fillable = [
        "nNome",
        "nMusica",
        "nData",
        "nLetra",
        "categoria_id",
    ];

    protected $casts = [
        'categoria_id'=>'integer'
    ];

    public function categoria(){

        return $this->belongsTo(Categoria::class, 'categoria_id');
    }
}
