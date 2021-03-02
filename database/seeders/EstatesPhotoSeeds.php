<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstatesPhotoSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::disableQueryLog();

        DB::table('estates_photos')->insert(['estates_contents_id' => 1,'sort'=>1 ]);
        DB::table('estates_photos')->insert(['estates_contents_id' => 1,'sort'=>2  ]);
        DB::table('estates_photos')->insert(['estates_contents_id' => 1,'sort'=>3  ]);
        DB::table('estates_photos')->insert(['estates_contents_id' => 1,'sort'=>4  ]);
        DB::table('estates_photos')->insert(['estates_contents_id' => 2,'sort'=>1  ]);
        DB::table('estates_photos')->insert(['estates_contents_id' => 2,'sort'=>2  ]);
        DB::table('estates_photos')->insert(['estates_contents_id' => 2,'sort'=>3  ]);
        DB::table('estates_photos')->insert(['estates_contents_id' => 3,'sort'=>1 ]);
        DB::table('estates_photos')->insert(['estates_contents_id' => 3,'sort'=>2  ]);
        DB::table('estates_photos')->insert(['estates_contents_id' => 3,'sort'=>3  ]);
        DB::table('estates_photos')->insert(['estates_contents_id' => 4,'sort'=>1 ]);
        DB::table('estates_photos')->insert(['estates_contents_id' => 4,'sort'=>2  ]);
        DB::table('estates_photos')->insert(['estates_contents_id' => 4,'sort'=>3  ]);
        DB::table('estates_photos')->insert(['estates_contents_id' => 5,'sort'=>1 ]);
        DB::table('estates_photos')->insert(['estates_contents_id' => 5,'sort'=>2  ]);
        DB::table('estates_photos')->insert(['estates_contents_id' => 5,'sort'=>3  ]);
        DB::table('estates_photos')->insert(['estates_contents_id' => 6,'sort'=>1 ]);
        DB::table('estates_photos')->insert(['estates_contents_id' => 6,'sort'=>2  ]);
        DB::table('estates_photos')->insert(['estates_contents_id' => 6,'sort'=>3  ]);
        DB::table('estates_photos')->insert(['estates_contents_id' => 7,'sort'=>1 ]);
        DB::table('estates_photos')->insert(['estates_contents_id' => 7,'sort'=>2  ]);
        DB::table('estates_photos')->insert(['estates_contents_id' => 7,'sort'=>3  ]);
        DB::table('estates_photos')->insert(['estates_contents_id' => 8,'sort'=>1 ]);
        DB::table('estates_photos')->insert(['estates_contents_id' => 8,'sort'=>2  ]);
        DB::table('estates_photos')->insert(['estates_contents_id' => 8,'sort'=>3  ]);
    }
}
