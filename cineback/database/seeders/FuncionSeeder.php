<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FuncionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("funciones")->insert([
            [
                "sub"=>true,
                "traducida"=>true,
                "tipo"=>"2D",
                "fecha"=>"2022-04-07",
                "hora"=>"20:10",
                "precio"=>"20",
                "pelicula_id"=>1,
                "sala_id"=>1,
            ],
            [
                "sub"=>true,
                "traducida"=>true,
                "tipo"=>"2D",
                "fecha"=>"2022-04-08",
                "hora"=>"21:00",
                "precio"=>"20",
                "pelicula_id"=>1,
                "sala_id"=>1,
            ],
            [
                "sub"=>true,
                "traducida"=>true,
                "tipo"=>"2D",
                "fecha"=>"2022-04-07",
                "hora"=>"22:00",
                "precio"=>"20",
                "pelicula_id"=>1,
                "sala_id"=>1,
            ],
            [
                "sub"=>true,
                "traducida"=>true,
                "tipo"=>"2D",
                "fecha"=>"2022-04-07",
                "hora"=>"23:00",
                "precio"=>"20",
                "pelicula_id"=>1,
                "sala_id"=>1,
            ]
        ]);
    }
}
