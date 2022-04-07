<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcion extends Model
{
    use HasFactory;
    protected $table="funciones";
    public function pelicula(){
        return $this->belongsTo(Pelicula::class);
    }
    public function sala(){
        return $this->belongsTo(Sala::class)->with('butacas');
    }
}
