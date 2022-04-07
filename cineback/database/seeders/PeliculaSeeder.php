<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeliculaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("peliculas")->insert([
           [
               "estreno"=>true,
               "estrellas"=>4,
                "titulo"=>"CODA: Señales del Corazón",
                "imagen"=>"1.jpg",
                "trailer"=>"https://www.youtube.com/watch?v=0pmfrE1YL4I&ab_channel=AppleTV",
                "clasificacion"=>"TP",
                "tiempo"=>"118",
                "director"=>"Sian Heder",
                "reparto"=>"Eugenio Derbez,Emilia Jones,Marlee Matlin",
                "sinopsis"=>"Ruby (Emilia Jones) es la única hija oyente en una peculiar familia de sordomudos, divide su día entre ayudar a su familia que depende de ella para comunicarse con el resto del mundo y perseguir sus sueños como cantante amateur con ayuda de Bernardo Villalobos (Eugenio Derbez), un apasionado profesor escolar que con sus inusuales métodos de enseñanza logra sacar lo mejor de sus alumnos.",
           ],
        ]);
    }
}
