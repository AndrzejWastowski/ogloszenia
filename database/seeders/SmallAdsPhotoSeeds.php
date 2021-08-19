<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SmallAdsPhotoSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::disableQueryLog();

        DB::table('small_ads_photos')->insert(['small_ads_contents_id' => 1,'sort'=>1, 'name' => 'lorem ipsum' ]);
     
    }
}
