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
  
        DB::table('prices')->insert(['name' => 'master_portal_7','description'=>'Wyświetl na głownym portalu 7 dni', 'price'=>20,'section'=>'small_ads' ]);
        DB::table('prices')->insert(['name' => 'master_portal_14','description'=>'Wyświetl na głownym portalu 14dni', 'price'=>38,'section'=>'small_ads' ]);
        DB::table('prices')->insert(['name' => 'master_portal_30','description'=>'Wyświetl na głownym portalu 30 dni', 'price'=>54,'section'=>'small_ads' ]);

        DB::table('prices')->insert(['name' => 'promoted_7', 'description'=>'Wyświetl nad innymi ogłoszeniami 7 dni', 'price'=>10,'section'=>'small_ads' ]);
        DB::table('prices')->insert(['name' => 'promoted_14','description'=>'Wyświetl nad innymi ogłoszeniami 14 dni', 'price'=>15,'section'=>'small_ads' ]);
        DB::table('prices')->insert(['name' => 'promoted_30', 'description'=>'Wyświetl nad innymi ogłoszeniami 30 dni', 'price'=>30,'section'=>'small_ads' ]);;

        DB::table('prices')->insert(['name' => 'highlighted_7',  'description'=>'Kolorowe tło 7 dni', 'price'=>8,'section'=>'small_ads' ]);
        DB::table('prices')->insert(['name' => 'highlighted_14', 'description'=>'Kolorowe tło 14 dni', 'price'=>14, 'section'=>'small_ads' ]);
        DB::table('prices')->insert(['name' => 'highlighted_30', 'description'=>'Kolorowe tło 30 dni', 'price'=>25, 'section'=>'small_ads' ]);
                
        DB::table('prices')->insert(['name' => 'inscription_7', 'description'=>'Wyróżnicający napis 7 dni', 'price'=>3,'section'=>'small_ads' ]);
        DB::table('prices')->insert(['name' => 'inscription_14', 'description'=>'Wyróżnicający napis 14 dni', 'price'=>5,'section'=>'small_ads' ]);
        DB::table('prices')->insert(['name' => 'inscription_30', 'description'=>'Wyróżnicający napis 30 dni', 'price'=>8,'section'=>'small_ads' ]);

        DB::table('prices')->insert(['name' => 'newspaper_advertisement', 'description'=>'Ogłoszenie w gazecie', 'price'=>9,'section'=>'small_ads' ]);
        DB::table('prices')->insert(['name' => 'newspaper_frame', 'description'=>'Ramka wokół ogłoszenia', 'price'=>3,'section'=>'small_ads' ]);
        DB::table('prices')->insert(['name' => 'newspaper_background', 'description'=>'Wydrkuj naszarym tle', 'price'=>3,'section'=>'small_ads' ]);
        DB::table('prices')->insert(['name' => 'newspaper_photo', 'description'=>'Ogłoszenie w gazecie', 'price'=>10,'section'=>'small_ads' ]);

        //usługi

        DB::table('prices')->insert(['name' => 'master_portal_7','description'=>'Wyświetl na głownym portalu 7 dni', 'price'=>20,'section'=>'services' ]);
        DB::table('prices')->insert(['name' => 'master_portal_14','description'=>'Wyświetl na głownym portalu 14 dni', 'price'=>38,'section'=>'services' ]);
        DB::table('prices')->insert(['name' => 'master_portal_30','description'=>'Wyświetl  na głownym portalu 30 dni', 'price'=>54,'section'=>'services' ]);

        DB::table('prices')->insert(['name' => 'promoted_7', 'description'=>'Wyświetl nad zwykłymi ogłoszeniami 7 dni', 'price'=>10,'section'=>'services' ]);
        DB::table('prices')->insert(['name' => 'promoted_14','description'=>'Wyświetl nad zwykłymi ogłoszeniami 14 dni', 'price'=>15,'section'=>'services' ]);
        DB::table('prices')->insert(['name' => 'promoted_30', 'description'=>'Wyświetl nad zwykłymi ogłoszeniami 30 dni', 'price'=>30,'section'=>'services' ]);;

        DB::table('prices')->insert(['name' => 'highlighted_7',  'description'=>'Kolorowe tło 7 dni', 'price'=>8,'section'=>'services' ]);
        DB::table('prices')->insert(['name' => 'highlighted_14', 'description'=>'Kolorowe tło 14 dni', 'price'=>14, 'section'=>'services' ]);
        DB::table('prices')->insert(['name' => 'highlighted_30', 'description'=>'Kolorowe tło 30 dni', 'price'=>25, 'section'=>'services' ]);
                
        DB::table('prices')->insert(['name' => 'inscription_7', 'description'=>'Wyróżnicający napis 7 dni', 'price'=>3,'section'=>'services' ]);
        DB::table('prices')->insert(['name' => 'inscription_14', 'description'=>'Wyróżnicający napis 14 dni', 'price'=>5,'section'=>'services' ]);
        DB::table('prices')->insert(['name' => 'inscription_30', 'description'=>'Wyróżnicający napis 30 dni', 'price'=>8,'section'=>'services' ]);

        DB::table('prices')->insert(['name' => 'newspaper_advertisement', 'description'=>'Ogłoszenie w gazecie', 'price'=>9,'section'=>'services' ]);
        DB::table('prices')->insert(['name' => 'newspaper_frame', 'description'=>'Ramka wokół ogłoszenia', 'price'=>3,'section'=>'services' ]);
        DB::table('prices')->insert(['name' => 'newspaper_background', 'description'=>'Wydrkuj na szarym tle', 'price'=>3,'section'=>'services' ]);
        DB::table('prices')->insert(['name' => 'newspaper_photo', 'description'=>'Ogłoszenie w gazecie', 'price'=>10,'section'=>'services' ]);

        //praca

        DB::table('prices')->insert(['name' => 'master_portal_7','description'=>'Wyświetl na głownym portalu 7 dni', 'price'=>20,'section'=>'job' ]);
        DB::table('prices')->insert(['name' => 'master_portal_14','description'=>'Wyświetl na głownym portalu 14dni', 'price'=>38,'section'=>'job' ]);
        DB::table('prices')->insert(['name' => 'master_portal_30','description'=>'Wyświetl na głownym portalu 30 dni', 'price'=>54,'section'=>'job' ]);

        DB::table('prices')->insert(['name' => 'promoted_7', 'description'=>'Wyświetl nad zwykłymi ogłoszeniami 7 dni', 'price'=>10,'section'=>'job' ]);
        DB::table('prices')->insert(['name' => 'promoted_14','description'=>'Wyświetl nad zwykłymi ogłoszeniami 14 dni', 'price'=>15,'section'=>'job' ]);
        DB::table('prices')->insert(['name' => 'promoted_30', 'description'=>'Wyświetl nad zwykłymi ogłoszeniami 30 dni', 'price'=>30,'section'=>'job' ]);;

        DB::table('prices')->insert(['name' => 'highlighted_7',  'description'=>'Kolorowe tło 7 dni', 'price'=>8,'section'=>'job' ]);
        DB::table('prices')->insert(['name' => 'highlighted_14', 'description'=>'Kolorowe tło 14 dni', 'price'=>14, 'section'=>'job' ]);
        DB::table('prices')->insert(['name' => 'highlighted_30', 'description'=>'Kolorowe tło 30 dni', 'price'=>25, 'section'=>'job' ]);
                
        DB::table('prices')->insert(['name' => 'inscription_7', 'description'=>'Wyróżnicający napis 7 dni', 'price'=>3,'section'=>'job' ]);
        DB::table('prices')->insert(['name' => 'inscription_14', 'description'=>'Wyróżnicający napis 14 dni', 'price'=>5,'section'=>'job' ]);
        DB::table('prices')->insert(['name' => 'inscription_30', 'description'=>'Wyróżnicający napis 30 dni', 'price'=>8,'section'=>'job' ]);

        DB::table('prices')->insert(['name' => 'newspaper_advertisement', 'description'=>'Ogłoszenie w gazecie', 'price'=>9,'section'=>'job' ]);
        DB::table('prices')->insert(['name' => 'newspaper_frame', 'description'=>'Ramka wokół ogłoszenia', 'price'=>3,'section'=>'job' ]);
        DB::table('prices')->insert(['name' => 'newspaper_background', 'description'=>'Wydrkuj naszarym tle', 'price'=>3,'section'=>'job' ]);
        DB::table('prices')->insert(['name' => 'newspaper_photo', 'description'=>'Ogłoszenie w gazecie', 'price'=>10,'section'=>'job' ]);

        //nieruchomości
        
        DB::table('prices')->insert(['name' => 'master_portal_7','description'=>'Wyświetl na głownym portalu 7 dni', 'price'=>20,'section'=>'estates' ]);
        DB::table('prices')->insert(['name' => 'master_portal_14','description'=>'Wyświetl na głownym portalu 14dni', 'price'=>38,'section'=>'estates' ]);
        DB::table('prices')->insert(['name' => 'master_portal_30','description'=>'Wyświetl na głownym portalu 30 dni', 'price'=>54,'section'=>'estates' ]);

        DB::table('prices')->insert(['name' => 'promoted_7', 'description'=>'Wyświetl nad zwykłymi ogłoszeniami 7 dni', 'price'=>10,'section'=>'estates' ]);
        DB::table('prices')->insert(['name' => 'promoted_14','description'=>'Wyświetl nad zwykłymi ogłoszeniami 14 dni', 'price'=>15,'section'=>'estates' ]);
        DB::table('prices')->insert(['name' => 'promoted_30', 'description'=>'Wyświetl nad zwykłymi ogłoszeniami 30 dni', 'price'=>30,'section'=>'estates' ]);;

        DB::table('prices')->insert(['name' => 'highlighted_7',  'description'=>'Kolorowe tło 7 dni', 'price'=>8,'section'=>'estates' ]);
        DB::table('prices')->insert(['name' => 'highlighted_14', 'description'=>'Kolorowe tło 14 dni', 'price'=>14, 'section'=>'estates' ]);
        DB::table('prices')->insert(['name' => 'highlighted_30', 'description'=>'Kolorowe tło 30 dni', 'price'=>25, 'section'=>'estates' ]);
                
        DB::table('prices')->insert(['name' => 'inscription_7', 'description'=>'Wyróżnicający napis 7 dni', 'price'=>3,'section'=>'estates' ]);
        DB::table('prices')->insert(['name' => 'inscription_14', 'description'=>'Wyróżnicający napis 14 dni', 'price'=>5,'section'=>'estates' ]);
        DB::table('prices')->insert(['name' => 'inscription_30', 'description'=>'Wyróżnicający napis 30 dni', 'price'=>8,'section'=>'estates' ]);

        DB::table('prices')->insert(['name' => 'newspaper_advertisement', 'description'=>'Ogłoszenie w gazecie', 'price'=>9,'section'=>'estates' ]);
        DB::table('prices')->insert(['name' => 'newspaper_frame', 'description'=>'Ramka wokół ogłoszenia', 'price'=>3,'section'=>'estates' ]);
        DB::table('prices')->insert(['name' => 'newspaper_background', 'description'=>'Wydrkuj naszarym tle', 'price'=>3,'section'=>'estates' ]);
        DB::table('prices')->insert(['name' => 'newspaper_photo', 'description'=>'Ogłoszenie w gazecie', 'price'=>10,'section'=>'estates' ]);

        // motoryzacja

        DB::table('prices')->insert(['name' => 'master_portal_7','description'=>'Wyświetl na głownym portalu 7 dni', 'price'=>20,'section'=>'cars' ]);
        DB::table('prices')->insert(['name' => 'master_portal_14','description'=>'Wyświetl na głownym portalu 14dni', 'price'=>38,'section'=>'cars' ]);
        DB::table('prices')->insert(['name' => 'master_portal_30','description'=>'Wyświetl na głownym portalu 30 dni', 'price'=>54,'section'=>'cars' ]);

        DB::table('prices')->insert(['name' => 'promoted_7', 'description'=>'Wyświetl nad zwykłymi  ogłoszeniami 7 dni', 'price'=>10,'section'=>'cars' ]);
        DB::table('prices')->insert(['name' => 'promoted_14','description'=>'Wyświetl nad zwykłymi ogłoszeniami 14 dni', 'price'=>15,'section'=>'cars' ]);
        DB::table('prices')->insert(['name' => 'promoted_30', 'description'=>'Wyświetl nad zwykłymi ogłoszeniami 30 dni', 'price'=>30,'section'=>'cars' ]);;

        DB::table('prices')->insert(['name' => 'highlighted_7',  'description'=>'Kolorowe tło 7 dni', 'price'=>8,'section'=>'cars' ]);
        DB::table('prices')->insert(['name' => 'highlighted_14', 'description'=>'Kolorowe tło 14 dni', 'price'=>14, 'section'=>'cars' ]);
        DB::table('prices')->insert(['name' => 'highlighted_30', 'description'=>'Kolorowe tło 30 dni', 'price'=>25, 'section'=>'cars' ]);
                
        DB::table('prices')->insert(['name' => 'inscription_7', 'description'=>'Wyróżnicający napis 7 dni', 'price'=>3,'section'=>'cars' ]);
        DB::table('prices')->insert(['name' => 'inscription_14', 'description'=>'Wyróżnicający napis 14 dni', 'price'=>5,'section'=>'cars' ]);
        DB::table('prices')->insert(['name' => 'inscription_30', 'description'=>'Wyróżnicający napis 30 dni', 'price'=>8,'section'=>'cars' ]);

        DB::table('prices')->insert(['name' => 'newspaper_advertisement', 'description'=>'Ogłoszenie w gazecie', 'price'=>9,'section'=>'cars' ]);
        DB::table('prices')->insert(['name' => 'newspaper_frame', 'description'=>'Ramka wokół ogłoszenia', 'price'=>3,'section'=>'cars' ]);
        DB::table('prices')->insert(['name' => 'newspaper_background', 'description'=>'Wydrkuj naszarym tle', 'price'=>3,'section'=>'cars' ]);
        DB::table('prices')->insert(['name' => 'newspaper_photo', 'description'=>'Ogłoszenie w gazecie', 'price'=>10,'section'=>'cars' ]);
        
        
    }
}
