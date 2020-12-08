<?php

use Illuminate\Database\Seeder;

class AdsCategoriesSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::disableQueryLog();
        
        //1
        DB::table('ads_categories')->insert([
            'name'=> 'Antyki / Sztuka / Kolekcje',
            'link'=> 'antyki',
            'icon'=> 'fas fa-grin-hearts',
            'popular'=> '1',
            'description'=> 'kolekcje, numizmatyka, fialatelistyka starocie'
        ]);
                   
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'ads_categories_id'=> $LAST_ID,
            'link'=> 'antyki',
            'name' => 'antyki'
        ],
        [
            'ads_categories_id'=> $LAST_ID,
            'link'=> 'malarstwo',
            'name' => 'malarstwo'
        ],
        [
            'ads_categories_id'=> $LAST_ID,
            'link'=> 'kolekcje',
            'name' => 'kolekcje'
        ],
        [
            'ads_categories_id'=> $LAST_ID,
            'link'=> 'militaria',
            'name' => 'militaria'
        ],
        [
            'ads_categories_id'=> $LAST_ID,
            'link'=> 'rekodzielo',
            'name' => 'rękodzieło'
        ]];


        foreach ($data as $key => $d) {
            DB::table('ads_sub_categories')->insert($d);
            //  $this->command->info($key);
        }

        DB::table('ads_categories')->insert([
            'name'=> 'Zoologiczne',
            'link'=> 'zoologiczne',
            'icon'=> '',
            'popular'=> '0',
            'description'=> 'smycze, karmniki, zwierzęta'
        ]);
                   
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'ads_categories_id'=> $LAST_ID,
            'link'=> 'dla_psow',
            'name' => 'dla psów'
        ],
        [
            'ads_categories_id'=> $LAST_ID,
            'link'=> 'dla_kotow',
            'name' => 'dla kotów'
        ],
        [
            'ads_categories_id'=> $LAST_ID,
            'link'=> 'gryzonie',
            'name' => 'gryzonie'
        ],
        [
            'ads_categories_id'=> $LAST_ID,
            'link'=> 'ptaki',
            'name' => 'ptaki'
        ],
        [
            'ads_categories_id'=> $LAST_ID,
            'link'=> 'gady_plazy',
            'name' => 'gady i płazy'
        ],
        [
            'ads_categories_id'=> $LAST_ID,
            'link'=> 'stawonogi',
            'name' => 'pająki / skorpiony'
        ],
        [
            'ads_categories_id'=> $LAST_ID,
            'link'=> 'pozostale_zwierzaki',
            'name' => 'pozostałe zwierzaki'
        ]];

     
        foreach ($data as $key => $d) {
            DB::table('ads_sub_categories')->insert($d);
            // $this->command->info($key);
        }

        DB::table('ads_categories')->insert([
            'name'=> 'Artykuły Biurowe',
            'link'=> 'artykuly_biurowe',
            'icon'=> 'fas fa-building',
            'popular'=> '1',
            'description'=> 'niszczarki, art biurowe'
        ]);
                   
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'ads_categories_id'=> $LAST_ID,
            'link'=> 'maszyny_urzadzenia',
            'name' => 'maszyny i urządzenia'
        ],
        [
            'ads_categories_id'=> $LAST_ID,
            'link'=> 'materialy_biurowe',
            'name' => 'materiały i akcesoria'
        ],
        [
            'ads_categories_id'=> $LAST_ID,
            'link'=> 'meble_biurowe',
            'name' => 'meble biurowe'
        ],
        [
            'ads_categories_id'=> $LAST_ID,
            'link'=> 'sklep_magazyn',
            'name' => 'sklep i magazyn'
        ],
        [
            'ads_categories_id'=> $LAST_ID,
            'link'=> 'reklamowe',
            'name' => 'materiały reklamowe'
        ]];

        foreach ($data as $key => $d) {
            DB::table('ads_sub_categories')->insert($d);
            //  $this->command->info($key);
        }

        DB::table('ads_categories')->insert([
            'name'=> 'Biżuteria i zegarki',
            'link'=> 'bizuteria_zegarki',
            'icon'=> '',
            'popular'=> '0',
            'description'=> ''
        ]);
                   
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'ads_categories_id'=> $LAST_ID,
            'link'=> 'bizuteria',
            'name' => 'biżuteria'
        ],
        [
            'ads_categories_id'=> $LAST_ID,
            'link'=> 'zegarki_meskie',
            'name' => 'zegarki męskie'
        ],
        [
            'ads_categories_id'=> $LAST_ID,
            'link'=> 'zegarki_damskie',
            'name' => 'zegarki damskie'
        ]];

        foreach ($data as $key => $d) {
            DB::table('ads_sub_categories')->insert($d);
            //  $this->command->info($key);
        }
      
        DB::table('ads_categories')->insert([
            'name'=> 'Dom i ogród',
            'link'=> 'dom_i_ogrod',
            'icon'=> 'fas fa-home',
            'popular'=> '1',
            'description'=> 'Dom i ogród'
        ]);
                   
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'ads_categories_id'=> $LAST_ID,
            'link'=> 'meble',
            'name' => 'meble'
        ],
        [
            'ads_categories_id'=> $LAST_ID,
            'link'=> 'wyposazenie_wnetrz',
            'name' => 'wyposażenie wnętrz'
        ],
        [
            'ads_categories_id'=> $LAST_ID,
            'link'=> 'budownictwo_akcesoria',
            'name' => 'budownictwo i akcesoria'
        ],
        [
            'ads_categories_id'=> $LAST_ID,
            'link'=> 'oswietlenie',
            'name' => 'oświetlenie'
        ],
        [
            'ads_categories_id'=> $LAST_ID,
            'link'=> 'narzedzia_ogrodnicze',
            'name' => 'narzędzia ogrodnicze'
        ],
        [
            'ads_categories_id'=> $LAST_ID,
            'link'=> 'rosliny',
            'name' => 'rośliny'
        ],
        [
            'ads_categories_id'=> $LAST_ID,
            'link'=> 'nawadnianie',
            'name' => 'nawadnianie ogrodu'
        ]];
        foreach ($data as $key => $d) {
            DB::table('ads_sub_categories')->insert($d);
            //  $this->command->info($key);
        }


        
        DB::table('ads_categories')->insert([
            'name'=> 'Artykuły budlowlane',
            'link'=> 'artykuly_budowlane',
            'icon'=> '',
            'popular'=> '0',
            'description'=> ''
        ]);
                   
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'ads_categories_id'=> $LAST_ID,
            'link'=> 'materialy_budowlane',
            'name' => 'materiały budowlane'
        ],
        [
            'ads_categories_id'=> $LAST_ID,
            'link'=> 'narzedzia_budowlane',
            'name' => 'narzędzia budowlane'
        ]];
        foreach ($data as $key => $d) {
            DB::table('ads_sub_categories')->insert($d);
            //  $this->command->info($key);
        }

        DB::table('ads_categories')->insert([
            'name'=> 'Dziecko',
            'link'=> 'dziecko',
            'icon'=> 'fas fa-baby',
            'popular'=> '1',
            'description'=> ''
        ]);
                   
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'ads_categories_id'=> $LAST_ID,
            'link'=> 'zabawki',
            'name' => 'zabawki i pojazdy'
        ],
        [
            'ads_categories_id'=> $LAST_ID,
            'link'=> 'wyprawka_niemowlaka',
            'name' => 'wyprawka niemowlaka'
        ]];
        foreach ($data as $key => $d) {
            DB::table('ads_sub_categories')->insert($d);
            //  $this->command->info($key);
        }

        DB::table('ads_categories')->insert([
            'name'=> 'Zdrowie',
            'link'=> 'zdrowie',
            'icon'=> 'fas fa-heartbeat',
            'popular'=> '1',
            'description'=> 'ochudzanie, oczyszczanie, higiena, urządzenia medyczne'
        ]);
                   
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'ads_categories_id'=> $LAST_ID,
            'link'=> 'odchudzanie',
            'name' => 'Odchudzanie'
        ],
        [
            'ads_categories_id'=> $LAST_ID,
            'link'=> 'suplementy_diety',
            'name' => 'Suplementy dniety'
        ]];
        foreach ($data as $key => $d) {
            DB::table('ads_sub_categories')->insert($d);
            //  $this->command->info($key);
        }
        
        DB::table('ads_categories')->insert([
            'name'=> 'Uroda',
            'link'=> 'uroda',
            'icon'=> '',
            'popular'=> '1',
            'description'=> 'kosmetyki, olejki do masażu'
        ]);
                   
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'ads_categories_id'=> $LAST_ID,
            'link' => 'perfumy',
            'name' => 'Perfumy'
        ],
        [
            'ads_categories_id'=> $LAST_ID,
            'link' => 'makijaz',
            'name' => 'Makijaż'
        ],
        [
            'ads_categories_id'=> $LAST_ID,
            'link' => 'manicure',
            'name' => 'Manicure i Pedicure'
        ],
        [
            'ads_categories_id'=> $LAST_ID,
            'link' => 'pielegnacja_ciala',
            'name' => 'Pielęgnacja ciała'
        ]
    ];
        foreach ($data as $key => $d) {
            DB::table('ads_sub_categories')->insert($d);
            //  $this->command->info($key);
        }

        DB::table('ads_categories')->insert([
            'name'=> 'Elektronika',
            'link'=> 'elektronika',
            'icon'=> 'fas fa-laptop',
            'popular'=> '1',
            'description'=> ''
        ]);
                   
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'ads_categories_id'=> $LAST_ID,
            'link'=> 'rtv',
            'name' => 'Sprzet RTV / TV i Video '
        ],
        [
            'ads_categories_id'=> $LAST_ID,
            'link'=> 'sprzet_audio',
            'name' => 'aprzęt audio'
        ],
        [
            'ads_categories_id'=> $LAST_ID,
            'link'=> 'glosniki_sluchawki',
            'name' => 'Głośniki i słuchawki'
        ],
        [
            'ads_categories_id'=> $LAST_ID,
            'link'=> 'agd_wolnostojace',
            'name' => 'AGD wolnostojące'
        ],
        [
            'ads_categories_id'=> $LAST_ID,
            'link'=> 'smartfony_akcesoria',
            'name' => 'Smartfony i akcesoria'
        ],
        [
            'ads_categories_id'=> $LAST_ID,
            'link'=> 'komputery_laptopy',
            'name' => 'Komputery i laptopy'
        ],
        [
            'ads_categories_id'=> $LAST_ID,
            'link'=> 'agd_zabudowa',
            'name' => 'AGD - zabudowa'
        ],
        [
            'ads_categories_id'=> $LAST_ID,
            'link'=> 'drobny_sprzet',
            'name' => 'Drobny sprzęt domowy'
        ],
        [
            'ads_categories_id'=> $LAST_ID,
            'link'=> 'konsole',
            'name' => 'Konsole i gry'
        ],
        [
            'ads_categories_id'=> $LAST_ID,
            'link'=> 'fotografia',
            'name' => 'Fotografia'
        ]];

        foreach ($data as $key => $d) {
            DB::table('ads_sub_categories')->insert($d);
            //    $this->command->info($key);
        }
      
        DB::table('ads_categories')->insert([
            'name'=> 'Muzyka - Instrumenty',
            'link'=> 'muzyka_instrumenty',
            'icon'=> '',
            'popular'=> '0',
            'description'=> 'instrumenty muzyczne'
        ]);
               
        
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'ads_categories_id'=> $LAST_ID,
            'link'=> 'strunowe',
            'name' => 'strunowe'
        ],
        [
            'ads_categories_id'=> $LAST_ID,
            'link'=> 'dete',
            'name' => 'dęte'
        ]];
        foreach ($data as $key => $d) {
            DB::table('ads_sub_categories')->insert($d);
            //  $this->command->info($key);
        }

        DB::table('ads_categories')->insert([
            'name'=> 'Książka / Komiks',
            'link'=> 'ksiazka_komiks',
            'icon'=> '',
            'popular'=> '0',
            'description'=> ''
        ]);
                   
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'ads_categories_id'=> $LAST_ID,
            'link'=> 'ksiazki',
            'name' => 'książki'
        ],
        [
            'ads_categories_id'=> $LAST_ID,
            'link'=> 'poradniki',
            'name' => 'poradniki'
        ],
        [
            'ads_categories_id'=> $LAST_ID,
            'link'=> 'podręczniki',
            'name' => 'podreczniki'
        ],
        [
            'ads_categories_id'=> $LAST_ID,
            'link'=> 'mapy',
            'name' => 'mapy'
        ],
        [
            'ads_categories_id'=> $LAST_ID,
            'link'=> 'komiksy',
            'name' => 'komiksy'
        ]];

        foreach ($data as $key => $d) {
            DB::table('ads_sub_categories')->insert($d);
            //  $this->command->info($key);
        }
        DB::table('ads_categories')->insert([
            'name'=> 'Elektronarzędzia',
            'link'=> 'elektronarzedzia',
            'icon'=> 'fas fa-tools',
            'popular'=> '1',
            'description'=> 'wiertarki, tokarki'
        ]);
                   
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'ads_categories_id'=> $LAST_ID,
            'link'=> 'reczne',
            'name' => 'ręczne'
        ],
        [
            'ads_categories_id'=> $LAST_ID,
            'link'=> 'stacjonarne',
            'name' => 'stacjonarne'
        ]];
        foreach ($data as $key => $d) {
            DB::table('ads_sub_categories')->insert($d);
            //   $this->command->info($key);
        }
        DB::table('ads_categories')->insert([
            'name'=> 'Rolnictwo',
            'link'=> 'rolnictwo',
            'icon'=> 'fas fa-tractor',
            'popular'=> '1',
            'description'=> ''
        ]);
                   
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'ads_categories_id'=> $LAST_ID,
            'link'=> 'rolnictwo',
            'name' => 'CL'
        ],
        [
            'ads_categories_id'=> $LAST_ID,
            'link'=> 'rolnictwo',
            'name' => 'Legend'
        ]];

        foreach ($data as $key => $d) {
            DB::table('ads_sub_categories')->insert($d);
            //  $this->command->info($key);
        }
        DB::table('ads_categories')->insert([
            'name'=> 'Sport ',
            'link'=> 'sport',
            'icon'=> 'fas fa-volleyball-ball',
            'popular'=> '1',
            'description'=> 'ciężarki, sprężyny '
        ]);
                   
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'ads_categories_id'=> $LAST_ID,
            'link'=> 'rower',
            'name' => 'Rowery i akcesoria'
        ],
        [
            'ads_categories_id'=> $LAST_ID,
            'link'=> 'druzynowe',
            'name' => 'Sporty drużynowe'
        ],
        [
            'ads_categories_id'=> $LAST_ID,
            'link'=> 'bieganie',
            'name' => 'Bieganie'
        ]];
        foreach ($data as $key => $d) {
            DB::table('ads_sub_categories')->insert($d);
            //  $this->command->info($key);
        }
       
        DB::table('ads_categories')->insert([
            'name'=> 'Turystyka',
            'link'=> 'turystyka',
            'icon'=> 'fas fa-luggage-cart',
            'popular'=> '1',
            'description'=> 'plecaki, namioty, plecaki, karimaty'
        ]);
                   
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'ads_categories_id'=> $LAST_ID,
            'link'=> 'namioty',
            'name' => 'Namioty i akcesoria'
        ],
        [
            'ads_categories_id'=> $LAST_ID,
            'link'=> 'odziez',
            'name' => 'Odzież turystyczna'
        ],
        [
            'ads_categories_id'=> $LAST_ID,
            'link'=> 'bagaz',
            'name' => 'Torby, plecaki, bagaż'
        ],
        [
            'ads_categories_id'=> $LAST_ID,
            'link'=> 'kuchnia',
            'name' => 'Kuchnia turystyczna'
        ],
        [
            'ads_categories_id'=> $LAST_ID,
            'link'=> 'nocleg',
            'name' => 'Śpiwory, materace'
        ]];

        foreach ($data as $key => $d) {
            DB::table('ads_sub_categories')->insert($d);
            //  $this->command->info($key);
        }

        DB::table('ads_categories')->insert([
            'name'=> 'Siłownia i fitnes',
            'link'=> 'fitnes',
            'icon'=> 'fas fa-luggage-cart',
            'popular'=> '1',
            'description'=> 'T'
        ]);
                   
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'ads_categories_id'=> $LAST_ID,
            'link'=> 'namioty',
            'name' => 'Namioty i akcesoria'
        ]];
        
        DB::table('ads_categories')->insert([
            'name'=> 'Moda',
            'link'=> 'moda',
            'icon'=> 'fas fa-tshirt',
            'popular'=> '1',
            'description'=> 'ubrania, czapki, okulary'
        ]);
                   
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'ads_categories_id'=> $LAST_ID,
            'link'=> 'meska',
            'name' => 'męska',
            'description'=> ''
        ],
        [
            'ads_categories_id'=> $LAST_ID,
            'name' => 'Żeńska',
            'link'=> 'zenska',
            'description'=> ''
        ]];

        foreach ($data as $key => $d) {
            DB::table('ads_sub_categories')->insert($d);
            //  $this->command->info($key);
        }
        DB::table('ads_categories')->insert([
            'name'=> 'Motoryzacja',
            'link'=> 'motoryzacja',
            'icon'=> 'fas fa-car-alt ',
            'popular'=> '1',
            'description'=> 'części, akcesoria samochodowe, kosmetyki, części'
        ]);
    }
}
