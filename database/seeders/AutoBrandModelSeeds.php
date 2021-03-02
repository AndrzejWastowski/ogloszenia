<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AutoBrandModelSeeds extends Seeder
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
        DB::table('cars_brands')->insert([
            'name'=> 'Acura'

        ]);
        
        $LAST_ID = DB::getPdo()->lastInsertId();

        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'CL'
        ],
        [
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Legend'
        ],
        [
            'cars_brands_id'=> $LAST_ID,
            'model' => 'MDX'
        ],
        [
            'cars_brands_id'=> $LAST_ID,
            'model' => 'RDX'
        ],
        [
            'cars_brands_id'=> $LAST_ID,
            'model' => 'RL'
        ],
        [
            'cars_brands_id'=> $LAST_ID,
            'model' => 'TL'
        ],
        [
            'cars_brands_id'=> $LAST_ID,
            'model' => 'TSX'
        ],
        [
            'cars_brands_id'=> $LAST_ID,
            'model' => 'ZDX'
        ]];

        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //  $this->command->info($key);
        }
        
        $LAST_ID = DB::getPdo()->lastInsertId();

        //2
        DB::table('cars_brands')->insert([
            'name'=> 'Alfa Romeo'
        ]);

        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => '33'
        ],
        [
            'cars_brands_id'=> $LAST_ID,
            'model' => '75'
        ],
        [
            'cars_brands_id'=> $LAST_ID,
            'model' => '145'
        ],
        [
            'cars_brands_id'=> $LAST_ID,
            'model' => '147'
        ],
        [
            'cars_brands_id'=> $LAST_ID,
            'model' => '155'
        ],
        [
            'cars_brands_id'=> $LAST_ID,
            'model' => '156'
        ],
        [
            'cars_brands_id'=> $LAST_ID,
            'model' => '159'
        ],
        [
            'cars_brands_id'=> $LAST_ID,
            'model' => '164'
        ],
        [
            'cars_brands_id'=> $LAST_ID,
            'model' => '166'
        ],
        [
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Alfasud'
        ],
        [
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Brera'
        ],
        [
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Crosswagon'
        ],
        [
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Giulia'
        ],
        [
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Giulietta'
        ],
        [
            'cars_brands_id'=> $LAST_ID,
            'model' => 'GT'
        ],
        [
            'cars_brands_id'=> $LAST_ID,
            'model' => 'GTV'
        ],
        [
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Mito'
        ],
        [
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Spider'
        ],
        [
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Sportwagon'
        ],
        [
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Stelvio'
        ]
        ];
        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //  $this->command->info($key);
        }
        
      
        #3
        DB::table('cars_brands')->insert([
            'name'=> 'Aro'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => '328'
        ],
        [
            'cars_brands_id'=> $LAST_ID,
            'model' => '243'
        ],
        [
            'cars_brands_id'=> $LAST_ID,
            'model' => '244'
        ],
        [
            'cars_brands_id'=> $LAST_ID,
            'model' => '145'
        ],
        [
            'cars_brands_id'=> $LAST_ID,
            'model' => '246'
        ],
        [
            'cars_brands_id'=> $LAST_ID,
            'model' => '104'
        ]];
        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //     $this->command->info($key);
        }
        

        DB::table('cars_brands')->insert([
            'name'=> 'Aston Martin'
        ]);

        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'DB8'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'DB9'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Vanquish'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'DB7'
        ]];
        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //    $this->command->info($key);
        }

        DB::table('cars_brands')->insert([
            'name'=> 'Audi'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'TT'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'A8/S8'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'A3/S3'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => '90'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'V8'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Q7'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'A4/S4'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => '100'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Allroad'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'A6/S6'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'A2'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => '80'
        ]];
        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //    $this->command->info($key);
        }
        /* model auta */
        DB::table('cars_brands')->insert([
            'name'=> 'Austin'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ]];
        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //    $this->command->info($key);
        }

        /* model auta */
        DB::table('cars_brands')->insert([
            'name'=> 'Barkas'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ]];
        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //     $this->command->info($key);
        }
        /* model auta */
        DB::table('cars_brands')->insert([
            'name'=> 'Bedford'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ]];
        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            // $this->command->info($key);
        }
        /* model auta */
        DB::table('cars_brands')->insert([
            'name'=> 'Bentley'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ]];
        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //   $this->command->info($key);
        }
        /* model auta */
        DB::table('cars_brands')->insert([
            'name'=> 'BMW'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Seria 3'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Z3'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Seria 5'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Seria 8'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Z4'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'X3'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Seria 6'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Seria 1'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'X5'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Seria 7'
        ]];
        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            // $this->command->info($key);
        }
        /* model auta */
        DB::table('cars_brands')->insert([
            'name'=> 'Bugatti'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ]];
        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //    $this->command->info($key);
        }
        /* model auta */
        DB::table('cars_brands')->insert([
            'name'=> 'Buick'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ]];
        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //    $this->command->info($key);
        }

        /* model auta */
        DB::table('cars_brands')->insert([
            'name'=> 'Cadillac'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ]];
        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //    $this->command->info($key);
        }
        
        /* model auta */
        DB::table('cars_brands')->insert([
            'name'=> 'Chevrolet'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Astro'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Avalanche'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Aveo'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Blazer'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Camaro'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Captiva'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Corsica'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Corvette'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Evanda'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Impala'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Lancetti'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Lumina'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Silverado'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Spark'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Venture'
        ]];
        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //    $this->command->info($key);
        }
        
        /* model auta */
        DB::table('cars_brands')->insert([
            'name'=> 'Chrysler'

        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => '300C'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => '300M'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Concorde'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Crossfire'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Grand Voyager'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Neon'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Pacifica'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'PT Cruiser'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Saratoga'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Sebring'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Stratus/Cirrus'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Town&Country'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Vission'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Voyager'
        ]];
        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //  $this->command->info($key);
        }
        
        /* model auta */
        DB::table('cars_brands')->insert([
            'name'=> 'Citroen'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'AX'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Berlingo'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'BX'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'C1'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'C2'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'C3'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'C3 Pluriel'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'C4'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'C5'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'C8'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'CX'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Evacion'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Saxo'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Xantia'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Xara'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Xara Picasso'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'XM'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'ZX'
        ]];
        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //   $this->command->info($key);
        }
        
        /* model auta */
        DB::table('cars_brands')->insert([
            'name'=> 'Dacia'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Logan'
        ]];
        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //    $this->command->info($key);
        }
        
        /* model auta */
        DB::table('cars_brands')->insert([
            'name'=> 'Daewoo'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Espero'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Korando'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Lanos'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Leganza'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Matiz'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Musso'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Nexia'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Nubira'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Tacuma'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Tico'
        ]];
        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //    $this->command->info($key);
        }
        
        /* model auta */
        DB::table('cars_brands')->insert([
            'name'=> 'Daf'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ]];
        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //  $this->command->info($key);
        }
        
        /* model auta */
        DB::table('cars_brands')->insert([
            'name'=> 'Daihatsu'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Applause'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Charade'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Cuore'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Feroza'
        ]];
        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //   $this->command->info($key);
        }
        
        /* model auta */
        DB::table('cars_brands')->insert([
            'name'=> 'Dodge'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Caliber'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Caravan'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Dacota'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Durango'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Grand Caravan'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Intrepid'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Magnum'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Neon'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'RAM'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Stealth'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Stratus'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Viper'
        ]];
        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //   $this->command->info($key);
        }
        
        /* model auta */
        DB::table('cars_brands')->insert([
            'name'=> 'Eagle'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ]];
        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //    $this->command->info($key);
        }
        
        /* model auta */
        DB::table('cars_brands')->insert([
            'name'=> 'Ferrari'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ]];
        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //  $this->command->info($key);
        }
        
        /* model auta */
        DB::table('cars_brands')->insert([
            'name'=> 'Fiat'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => '125'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => '126'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Albea'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Barchetta'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Brava'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Bravo'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Cinquecento'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Coupe'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Croma'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Doblo'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Idea'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Marea'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Multipla'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Palio Weekend'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Panda'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Punto'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Grande Punto'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Scudo'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Seicento'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Siena'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Stilo'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Tempra'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Tipo'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Ulysse'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Uno'
        ]];
        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //   $this->command->info($key);
        }
        
        /* model auta */
        DB::table('cars_brands')->insert([
            'name'=> 'Ford'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Aerostar'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Cougar'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Escort'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Expedition'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Explorer'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Fiesta'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Focus'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Focus C-max'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Fusion'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Galaxy'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Granada'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Ka/StreetKA'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Maverick'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Mondeo'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Mustang'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Orion'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Probe'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Puma'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Scorpio'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Seria F'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Sierra'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Taunus'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Taurus'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Transit'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Windstar'
        ]];
        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //    $this->command->info($key);
        }
        
        /* model auta */
        DB::table('cars_brands')->insert([
            'name'=> 'FSO'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'fiat 125p'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'fiat 126p'
        ]];
        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //     $this->command->info($key);
        }
        
        /* model auta */
        DB::table('cars_brands')->insert([
            'name'=> 'Gaz'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ]];
        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //    $this->command->info($key);
        }
        
        /* model auta */
        DB::table('cars_brands')->insert([
            'name'=> 'Geo'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ]];
        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //     $this->command->info($key);
        }
        
        /* model auta */
        DB::table('cars_brands')->insert([
            'name'=> 'GMC'
            
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ]];
        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //     $this->command->info($key);
        }
        
        /* model auta */
        DB::table('cars_brands')->insert([
            'name'=> 'HDPIC'
            
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ]];
        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //   $this->command->info($key);
        }
        
        /* model auta */
        DB::table('cars_brands')->insert([
            'name'=> 'Honda'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Accord'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'City'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Civic'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Concerto'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'CR-V'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'CRX'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'FR-V'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'HR-V'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Jazz'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Legend'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Odyssey'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Prelude'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'S2000'
        ]];
        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //    $this->command->info($key);
        }
        
        /* model auta */
        DB::table('cars_brands')->insert([
            'name'=> 'Hummer'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ]];
        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //     $this->command->info($key);
        }
        
        /* model auta */
        DB::table('cars_brands')->insert([
            'name'=> 'Hyundai'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Accent'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Atos'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Coupe'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Elantra'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Galloper'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Getz'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'H'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Lantra'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Matrix'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Ponny'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Santa Fe'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'SG'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Sonata'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Terracan'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Tucson'
        ]];

        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //   $this->command->info($key);
        }
        
        /* model auta */
        DB::table('cars_brands')->insert([
            'name'=> 'IFA'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ]];
        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //     $this->command->info($key);
        }
        
        /* model auta */
        DB::table('cars_brands')->insert([
            'name'=> 'Infiniti'
            
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ]];
        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //     $this->command->info($key);
        }
        
        /* model auta */
        DB::table('cars_brands')->insert([
            'name'=> 'Innocenti'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ]];
        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //    $this->command->info($key);
        }
        
        /* model auta */
        DB::table('cars_brands')->insert([
            'name'=> 'Isuzu'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ]];
        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //     $this->command->info($key);
        }
        
        /* model auta */
        DB::table('cars_brands')->insert([
            'name'=> 'Iveco'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ]];
        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //      $this->command->info($key);
        }
        
        /* model auta */
        DB::table('cars_brands')->insert([
            'name'=> 'Jaguar'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'S-type'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'X-type'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'XJ'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'XJR'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'XJS'
        ]];
        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //     $this->command->info($key);
        }
        
        /* model auta */
        DB::table('cars_brands')->insert([
            'name'=> 'Jeep'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Cherokee'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Grand Cherokee'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Liberty'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Wrangler'
        ]];

        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //    $this->command->info($key);
        }
        
        /* model auta */
        DB::table('cars_brands')->insert([
            'name'=> 'Kia'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Carnival'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Cee`d'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Cerato'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Clarus'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Joice'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Opirus/Amanti'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Picanto'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Pride'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Rio'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Sephia'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Shuma'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Sorento'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Sporttage'
        ]];
        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //    $this->command->info($key);
        }
        
        /* model auta */
        DB::table('cars_brands')->insert([
            'name'=> 'Koenigsegg'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ]];
        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //    $this->command->info($key);
        }
        
        /* model auta */
        DB::table('cars_brands')->insert([
            'name'=> 'Lamborgini'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ]];

        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //    $this->command->info($key);
        }
        
        /* model auta */
        DB::table('cars_brands')->insert([
            'name'=> 'Land Rover'
        ]);
        
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Defender'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Discovery'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Freelander'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Range Rover'
        ]];

        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //      $this->command->info($key);
        }
        
        /* model auta */
        DB::table('cars_brands')->insert([
            'name'=> 'LDV'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ]];

        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //      $this->command->info($key);
        }
        
        /* model auta */
        DB::table('cars_brands')->insert([
            'name'=> 'Lexus'
        ]);
        
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Seria ES'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Seria GS'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Seria IS'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Seria LS'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Seria RX'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Seria SC'
        ]];

        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //     $this->command->info($key);
        }
        
        /* model auta */
        DB::table('cars_brands')->insert([
            'name'=> 'Lincoln'
        ]);
        
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Continental'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Navigator'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Town Car'
        ]];
        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //      $this->command->info($key);
        }
        
        /* model auta */

        DB::table('cars_brands')->insert([
            'name'=> 'Lublin'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ]];
        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //      $this->command->info($key);
        }
        
        /* model auta */

        DB::table('cars_brands')->insert([
            'name'=> 'Łada'
        ]);
        
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => '2107'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Niva'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Samara'
        ]];
        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //       $this->command->info($key);
        }
        
        /* model auta */
        DB::table('cars_brands')->insert([
            'name'=> 'Maruti'
        ]);
        
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ]];
        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //      $this->command->info($key);
        }
        
        /* model auta */
        DB::table('cars_brands')->insert([
            'name'=> 'Maserati'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ]];

        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //      $this->command->info($key);
        }
        
        /* model auta */
        DB::table('cars_brands')->insert([
            'name'=> 'Maybach'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ]];

        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //     $this->command->info($key);
        }
        
        /* model auta */
        DB::table('cars_brands')->insert([
            'name'=> 'Mazda'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => '121'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => '323/323F'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => '2'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => '3'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => '3 MPS'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => '5'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => '6'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => '626'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => '929'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'MPV'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'MX-3'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'MX-5'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'MX-6'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Premacy'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'RX-7'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'RX-8'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Tribute'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Xedos'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'CX-3'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'CX-5'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'CX-7'
        ]];

        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //   $this->command->info($key);
        }
        
        /* model auta */
        DB::table('cars_brands')->insert([
            'name'=> 'Melex'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ]];

        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //      $this->command->info($key);
        }
        
        /* model auta */
        DB::table('cars_brands')->insert([
            'name'=> 'Mercedes'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'A klasa'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'B klasa'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'C klasa'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'CL/SEC'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'CLK'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'CLS'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'E klasa'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'G klasa'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'M klasa'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'R klasa'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'S klasa'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'SL'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'SLK'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'V klasa'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'W123'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'W124'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'W201 (190)'
        ]];

        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //     $this->command->info($key);
        }
        
        /* model auta */
        DB::table('cars_brands')->insert([
            'name'=> 'Mercury'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ]];
        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //     $this->command->info($key);
        }
        
        /* model auta */
        DB::table('cars_brands')->insert([
            'name'=> 'MG'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ]];
        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //     $this->command->info($key);
        }
        
        /* model auta */
        DB::table('cars_brands')->insert([
            'name'=> 'Micrus'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ]];
        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //     $this->command->info($key);
        }
        
        /* model auta */
        DB::table('cars_brands')->insert([
            'name'=> 'Mini'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ]];
        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //     $this->command->info($key);
        }
        
        /* model auta */

        DB::table('cars_brands')->insert([
            'name'=> 'Mitshubishi'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => '3000GT'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Carisma'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Colt'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Eclipse'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Galant'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Grandis'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'L200'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Lancer'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Outlander'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Pajero'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Sigma'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Space Gear'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Sigma'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Space Runner'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Space Star'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Space Wagon'
        ]];
        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //     $this->command->info($key);
        }
        
        /* model auta */
        DB::table('cars_brands')->insert([
            'name'=> 'Moskwicz'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ]];
        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //      $this->command->info($key);
        }
        
        /* model auta */
        DB::table('cars_brands')->insert([
            'name'=> 'Nissan'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => '100NX'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => '200SX'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => '350 Z'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Almera'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Almera Tino'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Altima'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Maxima'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Micra'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Murano'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Navara'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Note'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Pathfinder'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Patrol'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Primera'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Quest'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Serena'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Terrano'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Vanette'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'X-trail'
        ]];
        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //     $this->command->info($key);
        }
        
        /* model auta */
        DB::table('cars_brands')->insert([
            'name'=> 'NSU'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ]];
        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //        $this->command->info($key);
        }
        
        /* model auta */
        DB::table('cars_brands')->insert([
            'name'=> 'Nysa'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ]];
        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //         $this->command->info($key);
        }
        
        /* model auta */
        DB::table('cars_brands')->insert([
            'name'=> 'Oldsmobile'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ]];
        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //         $this->command->info($key);
        }
        
        /* model auta */
        DB::table('cars_brands')->insert([
            'name'=> 'Oltcit'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ]];
        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //           $this->command->info($key);
        }
        
        /* model auta */
        DB::table('cars_brands')->insert([
            'name'=> 'Opel'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Agila'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Ascona'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Astra'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Calibra'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Combo'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Corsa'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Frontera'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Kadett'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Manta'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Meriva'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Monterey'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Omega'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Record'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Senator'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Signum'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Sintra'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Tigra'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Vectra'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Zafira'
        ]];

        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //         $this->command->info($key);
        }
        
        /* model auta */
        DB::table('cars_brands')->insert([
            'name'=> 'Peugeot'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => '1007'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => '106'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => '107'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => '205'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => '206'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => '206cc'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => '207'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => '306'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => '307'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => '307cc'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => '309'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => '405'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => '406'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => '407'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => '605'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => '607'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => '806'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => '808'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Partner'
        ]];
        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //       $this->command->info($key);
        }
        
        /* model auta */
        DB::table('cars_brands')->insert([
            'name'=> 'Plymouth'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ]];
        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //      $this->command->info($key);
        }
        
        /* model auta */
        DB::table('cars_brands')->insert([
            'name'=> 'Polonez'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Caro'
        ]];
        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //      $this->command->info($key);
        }
        
        /* model auta */
        DB::table('cars_brands')->insert([
            'name'=> 'Pontiac'
        ]);
        
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Firebird'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Grand Am'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Grand Prix'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Sun Fire'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Trans Sport'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Vibe'
        ]];
        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //      $this->command->info($key);
        }
        
        /* model auta */
        DB::table('cars_brands')->insert([
            'name'=> 'Porsche'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => '911'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => '924'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => '928'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => '944'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Boxster'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Cayenne'
        ]];

        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //       $this->command->info($key);
        }
        
        /* model auta */
        DB::table('cars_brands')->insert([
            'name'=> 'Proton'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ]];

        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //       $this->command->info($key);
        }
        
        /* model auta */
        DB::table('cars_brands')->insert([
            'name'=> 'Renault'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => '19'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => '21'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => '25'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => '5'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Clio'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Espace'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Kangoo'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Laguna'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Megane'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Modus'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Safrane'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Scenic'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Thalia'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Twingo'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Vel Satis'
        ]];

        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //      $this->command->info($key);
        }
        
        /* model auta */
        DB::table('cars_brands')->insert([
            'name'=> 'Rolls-Royce'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ]];

        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //     $this->command->info($key);
        }
        
        /* model auta */
        DB::table('cars_brands')->insert([
            'name'=> 'Rover'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => '25'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => '45'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => '75'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Seria 100'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Seria 200'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Seria 400'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Seria 600'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Seria 800'
        ]];

        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //     $this->command->info($key);
        }
        
        /* model auta */
        DB::table('cars_brands')->insert([
            'name'=> 'Saab'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => '9-3'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => '9-5'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => '900'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => '90000'
        ]];

        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //    $this->command->info($key);
        }
        
        /* model auta */
        DB::table('cars_brands')->insert([
            'name'=> 'Saleen'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ]];

        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //   $this->command->info($key);
        }
        
        /* model auta */
        DB::table('cars_brands')->insert([
            'name'=> 'Sam'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ]];

        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //     $this->command->info($key);
        }
        
        /* model auta */
        DB::table('cars_brands')->insert([
            'name'=> 'Saturn'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ]];

        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //    $this->command->info($key);
        }
        
        /* model auta */
        DB::table('cars_brands')->insert([
            'name'=> 'Seat'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Alhambara'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Altea'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Arosa'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Cordoba'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Ibiza'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Inca'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Leon'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Malaga'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Marbella'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Toledo'
        ]];

        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //    $this->command->info($key);
        }
        
        /* model auta */
        DB::table('cars_brands')->insert([
            'name'=> 'Skoda'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Fabia'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Favorit'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Felicia'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Octavia'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Rumster'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Superb'
        ]];

        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //    $this->command->info($key);
        }
        
        /* model auta */
        DB::table('cars_brands')->insert([
            'name'=> 'Smart'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ]];

        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //    $this->command->info($key);
        }
        
        /* model auta */
        DB::table('cars_brands')->insert([
            'name'=> 'Ssan Young'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ]];

        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //    $this->command->info($key);
        }
        
        /* model auta */
        DB::table('cars_brands')->insert([
            'name'=> 'Subaru'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Forester'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Impreza'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Justy'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Legacy'
        ]];

        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //    $this->command->info($key);
        }
        
        /* model auta */
        DB::table('cars_brands')->insert([
            'name'=> 'Syrena'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => '105'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ]];

        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //      $this->command->info($key);
        }
        
        /* model auta */
        DB::table('cars_brands')->insert([
            'name'=> 'Talbot'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ]];

        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //      $this->command->info($key);
        }
        
        /* model auta */
        DB::table('cars_brands')->insert([
            'name'=> 'Tarpan'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ]];

        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //      $this->command->info($key);
        }
        
        /* model auta */
        DB::table('cars_brands')->insert([
            'name'=> 'Tatra'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ]];

        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //     $this->command->info($key);
        }
        
        /* model auta */
        DB::table('cars_brands')->insert([
            'name'=> 'Tavria'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ]];

        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //      $this->command->info($key);
        }
        
        /* model auta */
        DB::table('cars_brands')->insert([
            'name'=> 'Toyota'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Avalon'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Avensis'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Avensis Verso'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Aygo'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Camry'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Carina'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Celica'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Corolla'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Corolla Verso'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Hilux'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Land Cruiser'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'MR 2'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Passeo'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Picnic'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Previa'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Prius'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'RAV 4'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Sienna'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Starlet'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Supra'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Yaris'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Yaris Verso'
        ]];

        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //     $this->command->info($key);
        }
        
        /* model auta */
        DB::table('cars_brands')->insert([
            'name'=> 'Trabant'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ]];

        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //$this->command->info($key);
        }
        
        /* model auta */
        DB::table('cars_brands')->insert([
            'name'=> 'TVR'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ]];

        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //      $this->command->info($key);
        }
        
        /* model auta */
        DB::table('cars_brands')->insert([
            'name'=> 'Uaz'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ]];

        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //     $this->command->info($key);
        }
        
        /* model auta */
        DB::table('cars_brands')->insert([
            'name'=> 'Volkswagen'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Bora'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Corrado'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Fox'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Garbus'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Golf'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Jetta'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Lupo'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'New Beetle'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Passat'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Phaenton'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Polo'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Scirrocco'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Sharan'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Touran'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Touareg'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Transporter'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Vento'
        ]];

        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //     $this->command->info($key);
        }
        
        /* model auta */
        DB::table('cars_brands')->insert([
            'name'=> 'Volvo'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'C30'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'C70'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'S40/V40'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'S60'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'S70/V70'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'S80'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Seria 200'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Seria 300'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Seria 400'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Seria 700'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Seria 800'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Seria 900'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'V50'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'XC 70'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'XC 90'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ]];

        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //     $this->command->info($key);
        }
        
        /* model auta */
        DB::table('cars_brands')->insert([
            'name'=> 'Warszawa'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ]];

        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //      $this->command->info($key);
        }
        
        /* model auta */
        DB::table('cars_brands')->insert([
            'name'=> 'Wartburg'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ]];
        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //       $this->command->info($key);
        }
        
        /* model auta */

        DB::table('cars_brands')->insert([
            'name'=> 'Wołga'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ]];
        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //     $this->command->info($key);
        }
        
        /* model auta */

        DB::table('cars_brands')->insert([
            'name'=> 'Yugo'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ]];
        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //      $this->command->info($key);
        }
        
        /* model auta */

        DB::table('cars_brands')->insert([
            'name'=> 'Zaporożec'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ]];
        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //        $this->command->info($key);
        }
        
        /* model auta */

        DB::table('cars_brands')->insert([
            'name'=> 'Zastawa'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ]];
        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //       $this->command->info($key);
        }
        
        /* model auta */

        DB::table('cars_brands')->insert([
            'name'=> 'Żuk'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ]];
        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //        $this->command->info($key);
        }
        
        /* model auta */

        DB::table('cars_brands')->insert([
            'name'=> 'Lancia'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ]];
        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //       $this->command->info($key);
        }
        
        /* model auta */

        DB::table('cars_brands')->insert([
            'name'=> 'Suzuki'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ]];
        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //         $this->command->info($key);
        }
        
        /* model auta */

        DB::table('cars_brands')->insert([
            'name'=> 'Ligier'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Ambra'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Inny'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Nova'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'Optima'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'X - Too'
        ]];
        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //     $this->command->info($key);
        }
        
    

        /* model auta */

        DB::table('cars_brands')->insert([
            'name'=> 'inne'
        ]);
        $LAST_ID = DB::getPdo()->lastInsertId();
        $data = [[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ],[
            'cars_brands_id'=> $LAST_ID,
            'model' => 'xxx'
        ]];
        foreach ($data as $key => $d) {
            DB::table('cars_models')->insert($d);
            //       $this->command->info($key);
        }
        
        DB::enableQueryLog();
    }
}
