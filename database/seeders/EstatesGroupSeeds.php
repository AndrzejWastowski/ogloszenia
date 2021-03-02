<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstatesGroupSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estates_groups')->insert([
            'name'=> 'Spedzedam dla ludności',
            'description'=> 'Ogłoszenia sprzedażowe dla osób prywatnych'
        ]);


        DB::table('estates_groups')->insert([
            'name'=> 'Sprzedam firmom',
            'description'=> 'Ogłoszenia dla firm'
        ]);

        DB::table('estates_groups')->insert([
            'name'=> 'Wynajem',
            'description'=> 'wynajmę, dla ludzi i firm'
        ]);
    }
}
