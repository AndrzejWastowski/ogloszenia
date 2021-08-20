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

        DB::table('estates_photos')->insert(['estates_contents_id' => 1,'sort'=>1, 'name'=>'1' ]);
        DB::table('estates_photos')->insert(['estates_contents_id' => 1,'sort'=>2, 'name'=>'2' ]);
        DB::table('estates_photos')->insert(['estates_contents_id' => 1,'sort'=>3, 'name'=>'3' ]);
        DB::table('estates_photos')->insert(['estates_contents_id' => 1,'sort'=>4, 'name'=>'4' ]);
        DB::table('estates_photos')->insert(['estates_contents_id' => 2,'sort'=>1, 'name'=>'5' ]);
        DB::table('estates_photos')->insert(['estates_contents_id' => 2,'sort'=>2, 'name'=>'6' ]);
        DB::table('estates_photos')->insert(['estates_contents_id' => 2,'sort'=>3, 'name'=>'7' ]);
        DB::table('estates_photos')->insert(['estates_contents_id' => 3,'sort'=>1, 'name'=>'8' ]);
        DB::table('estates_photos')->insert(['estates_contents_id' => 3,'sort'=>2, 'name'=>'9' ]);
        DB::table('estates_photos')->insert(['estates_contents_id' => 3,'sort'=>3, 'name'=>'10' ]);
        DB::table('estates_photos')->insert(['estates_contents_id' => 4,'sort'=>1, 'name'=>'11' ]);
        DB::table('estates_photos')->insert(['estates_contents_id' => 4,'sort'=>2, 'name'=>'12' ]);
        DB::table('estates_photos')->insert(['estates_contents_id' => 4,'sort'=>3, 'name'=>'13' ]);
        DB::table('estates_photos')->insert(['estates_contents_id' => 5,'sort'=>1, 'name'=>'14' ]);
        DB::table('estates_photos')->insert(['estates_contents_id' => 5,'sort'=>2, 'name'=>'15' ]);
        DB::table('estates_photos')->insert(['estates_contents_id' => 5,'sort'=>3, 'name'=>'16' ]);
        DB::table('estates_photos')->insert(['estates_contents_id' => 6,'sort'=>1, 'name'=>'17' ]);
        DB::table('estates_photos')->insert(['estates_contents_id' => 6,'sort'=>2, 'name'=>'18' ]);
        DB::table('estates_photos')->insert(['estates_contents_id' => 6,'sort'=>3, 'name'=>'19' ]);
        DB::table('estates_photos')->insert(['estates_contents_id' => 7,'sort'=>1, 'name'=>'20' ]);
        DB::table('estates_photos')->insert(['estates_contents_id' => 7,'sort'=>2, 'name'=>'21' ]);
        DB::table('estates_photos')->insert(['estates_contents_id' => 7,'sort'=>3, 'name'=>'22' ]);
        DB::table('estates_photos')->insert(['estates_contents_id' => 8,'sort'=>1, 'name'=>'23' ]);
        DB::table('estates_photos')->insert(['estates_contents_id' => 8,'sort'=>2, 'name'=>'24' ]);
        DB::table('estates_photos')->insert(['estates_contents_id' => 8,'sort'=>3, 'name'=>'25' ]);
    }
}
