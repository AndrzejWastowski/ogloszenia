<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PricesSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
  

        DB::table('prices')->insert(['name' => 'rekomendacja 7 dni','price'=>20 ]);
        DB::table('prices')->insert(['name' => 'rekomendacja 14 dni','price'=>35 ]);
        DB::table('prices')->insert(['name' => 'rekomendacja 30 dni','price'=>50 ]);
        
        DB::table('prices')->insert(['name' => 'promocja 7 dni','price'=>10 ]);
        DB::table('prices')->insert(['name' => 'promocja 14 dni','price'=>15 ]);
        DB::table('prices')->insert(['name' => 'promocja 30 dni','price'=>30 ]);
      
        DB::table('prices')->insert(['name' => 'kolor 7 dni','price'=>8 ]);
        DB::table('prices')->insert(['name' => 'kolor 14 dni','price'=>14 ]);
        DB::table('prices')->insert(['name' => 'kolor 30 dni','price'=>25 ]);
    }
}
