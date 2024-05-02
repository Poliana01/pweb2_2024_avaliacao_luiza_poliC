<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    use HasFactory;

    protected $table = "playlists";
    //app/Models/
    protected $fillable = [
        "nomeplay",
        "musica_1_id",
        //"imagem",
        "musica_2_id",
        "musica_3_id",
        "musica_4_id",
        "musica_5_id",
        "musica_6_id",
        "musica_7_id",
        "categoria_id",
    ];

    protected $casts = [
        'musica_1_id'=>'integer',
        'musica_2_id'=>'integer',
        'musica_3_id'=>'integer',
        'musica_4_id'=>'integer',
        'musica_5_id'=>'integer',
        'musica_6_id'=>'integer',
        'musica_7_id'=>'integer',
        'categoria_id'=>'integer',
    ];

    public function categoria(){

        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    public function musica1(){

        return $this->belongsTo(Musica::class, 'musica_1_id');
    }

    public function musica2(){

        return $this->belongsTo(Musica::class, 'musica_2_id');
    }

    public function musica3(){

        return $this->belongsTo(Musica::class, 'musica_3_id');
    }

    public function musica4(){

        return $this->belongsTo(Musica::class, 'musica_4_id');
    }

    public function musica5(){

        return $this->belongsTo(Musica::class, 'musica_5_id');
    }

    public function musica6(){

        return $this->belongsTo(Musica::class, 'musica_6_id');
    }

    public function musica7(){

        return $this->belongsTo(Musica::class, 'musica_7_id');
    }
}
