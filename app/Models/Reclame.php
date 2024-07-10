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
        "nData",
        "nAvaliacao",
        "categoria",
    ];

}
