<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ButacaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('butacas')->insert([
            ["x"=>"A", "y"=>"1", "estado"=>"ACTIVO", "sala_id"=>1],
            ["x"=>"A", "y"=>"2", "estado"=>"ACTIVO", "sala_id"=>1],
            ["x"=>"A", "y"=>"3", "estado"=>"ACTIVO", "sala_id"=>1],
            ["x"=>"B", "y"=>"1", "estado"=>"INACTIVO", "sala_id"=>1],
            ["x"=>"B", "y"=>"2", "estado"=>"INACTIVO", "sala_id"=>1],
            ["x"=>"B", "y"=>"3", "estado"=>"ACTIVO", "sala_id"=>1],
            ["x"=>"C", "y"=>"1", "estado"=>"ACTIVO", "sala_id"=>1],
            ["x"=>"C", "y"=>"2", "estado"=>"ACTIVO", "sala_id"=>1],
            ["x"=>"C", "y"=>"3", "estado"=>"ACTIVO", "sala_id"=>1],
        ]);
    }
}
