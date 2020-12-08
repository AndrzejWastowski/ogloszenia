<?php

use Illuminate\Database\Seeder;

class CarsBodySeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cars_body')->insert([
            'name'=> 'coupe'
        ]);
        DB::table('cars_body')->insert([
            'name'=> 'sedan'
        ]);
        DB::table('cars_body')->insert([
            'name'=> 'kombi'
        ]);
        DB::table('cars_body')->insert([
            'name'=> 'suv'
        ]);
        DB::table('cars_body')->insert([
            'name'=> 'dostawczy'
        ]);
        DB::table('cars_body')->insert([
            'name'=> 'ciężarowy'
        ]);
    }
}
