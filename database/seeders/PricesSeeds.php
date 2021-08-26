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

        //ogloszenia drobne
  
        DB::table('prices')->insert(['name' => 'rekomendacja 7 dni','price'=>16,'section'=>'small_ads' ]);
        DB::table('prices')->insert(['name' => 'rekomendacja 14 dni','price'=>30,'section'=>'small_ads' ]);
        DB::table('prices')->insert(['name' => 'rekomendacja 30 dni','price'=>50,'section'=>'small_ads' ]);
        
        DB::table('prices')->insert(['name' => 'promocja 7 dni','price'=>10,'section'=>'small_ads' ]);
        DB::table('prices')->insert(['name' => 'promocja 14 dni','price'=>15,'section'=>'small_ads' ]);
        DB::table('prices')->insert(['name' => 'promocja 30 dni','price'=>30,'section'=>'small_ads' ]);;
      
        DB::table('prices')->insert(['name' => 'kolor 7 dni','price'=>8,'section'=>'small_ads' ]);
        DB::table('prices')->insert(['name' => 'kolor 14 dni','price'=>14,'section'=>'small_ads' ]);
        DB::table('prices')->insert(['name' => 'kolor 30 dni','price'=>25,'section'=>'small_ads' ]);

        DB::table('prices')->insert(['name' => 'gazeta_ogloszenie','price'=>10,'section'=>'small_ads' ]);
        DB::table('prices')->insert(['name' => 'gazeta_szare_tlo','price'=>5,'section'=>'small_ads' ]);
        DB::table('prices')->insert(['name' => 'gazeta_ramka','price'=>5,'section'=>'small_ads' ]);

        //usługi

        DB::table('prices')->insert(['name' => 'rekomendacja 7 dni','price'=>20,'section'=>'services' ]);
        DB::table('prices')->insert(['name' => 'rekomendacja 14 dni','price'=>35,'section'=>'services' ]);
        DB::table('prices')->insert(['name' => 'rekomendacja 30 dni','price'=>50,'section'=>'services' ]);
        
        DB::table('prices')->insert(['name' => 'promocja 7 dni','price'=>10,'section'=>'services' ]);
        DB::table('prices')->insert(['name' => 'promocja 14 dni','price'=>15,'section'=>'services' ]);
        DB::table('prices')->insert(['name' => 'promocja 30 dni','price'=>30,'section'=>'services' ]);;
      
        DB::table('prices')->insert(['name' => 'kolor 7 dni','price'=>8,'section'=>'services' ]);
        DB::table('prices')->insert(['name' => 'kolor 14 dni','price'=>14,'section'=>'services' ]);
        DB::table('prices')->insert(['name' => 'kolor 30 dni','price'=>25,'section'=>'services' ]);

        DB::table('prices')->insert(['name' => 'gazeta_ogloszenie','price'=>10,'section'=>'services' ]);
        DB::table('prices')->insert(['name' => 'gazeta_szare_tlo','price'=>5,'section'=>'services' ]);
        DB::table('prices')->insert(['name' => 'gazeta_ramka','price'=>5,'section'=>'services' ]);

        //praca

        DB::table('prices')->insert(['name' => 'rekomendacja 7 dni','price'=>20,'section'=>'job' ]);
        DB::table('prices')->insert(['name' => 'rekomendacja 14 dni','price'=>35,'section'=>'job' ]);
        DB::table('prices')->insert(['name' => 'rekomendacja 30 dni','price'=>50,'section'=>'job' ]);
        
        DB::table('prices')->insert(['name' => 'promocja 7 dni','price'=>10,'section'=>'job' ]);
        DB::table('prices')->insert(['name' => 'promocja 14 dni','price'=>15,'section'=>'job' ]);
        DB::table('prices')->insert(['name' => 'promocja 30 dni','price'=>30,'section'=>'job' ]);;
      
        DB::table('prices')->insert(['name' => 'kolor 7 dni','price'=>8,'section'=>'job' ]);
        DB::table('prices')->insert(['name' => 'kolor 14 dni','price'=>14,'section'=>'job' ]);
        DB::table('prices')->insert(['name' => 'kolor 30 dni','price'=>25,'section'=>'job' ]);

        DB::table('prices')->insert(['name' => 'gazeta_ogloszenie','price'=>10,'section'=>'job' ]);
        DB::table('prices')->insert(['name' => 'gazeta_szare_tlo','price'=>5,'section'=>'job' ]);
        DB::table('prices')->insert(['name' => 'gazeta_ramka','price'=>5,'section'=>'job' ]);


        //nieruchomości

        DB::table('prices')->insert(['name' => 'rekomendacja 7 dni','price'=>20,'section'=>'estates' ]);
        DB::table('prices')->insert(['name' => 'rekomendacja 14 dni','price'=>35,'section'=>'estates' ]);
        DB::table('prices')->insert(['name' => 'rekomendacja 30 dni','price'=>50,'section'=>'estates' ]);
        
        DB::table('prices')->insert(['name' => 'promocja 7 dni','price'=>10,'section'=>'estates' ]);
        DB::table('prices')->insert(['name' => 'promocja 14 dni','price'=>15,'section'=>'estates' ]);
        DB::table('prices')->insert(['name' => 'promocja 30 dni','price'=>30,'section'=>'estates' ]);;
      
        DB::table('prices')->insert(['name' => 'kolor 7 dni','price'=>8,'section'=>'estates' ]);
        DB::table('prices')->insert(['name' => 'kolor 14 dni','price'=>14,'section'=>'estates' ]);
        DB::table('prices')->insert(['name' => 'kolor 30 dni','price'=>25,'section'=>'estates' ]);

        DB::table('prices')->insert(['name' => 'gazeta_ogloszenie','price'=>10,'section'=>'estates' ]);
        DB::table('prices')->insert(['name' => 'gazeta_szare_tlo','price'=>5,'section'=>'estates' ]);
        DB::table('prices')->insert(['name' => 'gazeta_ramka','price'=>5,'section'=>'estates' ]);


        // motoryzacja

        DB::table('prices')->insert(['name' => 'rekomendacja 7 dni','price'=>20,'section'=>'cars' ]);
        DB::table('prices')->insert(['name' => 'rekomendacja 14 dni','price'=>35,'section'=>'cars' ]);
        DB::table('prices')->insert(['name' => 'rekomendacja 30 dni','price'=>50,'section'=>'cars' ]);
        
        DB::table('prices')->insert(['name' => 'promocja 7 dni','price'=>10,'section'=>'cars' ]);
        DB::table('prices')->insert(['name' => 'promocja 14 dni','price'=>15,'section'=>'cars' ]);
        DB::table('prices')->insert(['name' => 'promocja 30 dni','price'=>30,'section'=>'cars' ]);;
      
        DB::table('prices')->insert(['name' => 'kolor 7 dni','price'=>8,'section'=>'cars' ]);
        DB::table('prices')->insert(['name' => 'kolor 14 dni','price'=>14,'section'=>'cars' ]);
        DB::table('prices')->insert(['name' => 'kolor 30 dni','price'=>25,'section'=>'cars' ]);

        DB::table('prices')->insert(['name' => 'gazeta_ogloszenie','price'=>10,'section'=>'cars' ]);
        DB::table('prices')->insert(['name' => 'gazeta_szare_tlo','price'=>5,'section'=>'cars' ]);
        DB::table('prices')->insert(['name' => 'gazeta_ramka','price'=>5,'section'=>'cars' ]);



    }
}
