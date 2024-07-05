<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reclame extends Model
{
    use HasFactory;

    protected $table = "reclame";
    protected $fillable = [
        "nNome",
        "nMusica",
        "nLink",
        "nAvaliacao",
        "categoria_id",
    ];

    protected $casts = [
        'categoria_id'=>'integer'
    ];

    public function categoria(){

        return $this->belongsTo(Categoria::class, 'categoria_id');
    }
}
