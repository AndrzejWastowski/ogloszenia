<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarsContentSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::disableQueryLog();

        DB::table('cars_contents')->insert([
            'name' => 'Laptop lenovo',
            'lead' => 'Sed felis in libero consectetur luctus. Bharenus ',
            'description' => 'Proin magna nulla, porttitor vitae mollis a, cursus a nisi. Guis nulla dolor.  Cras venenatis vel massa ornare luctus. Sed porttitor ligula gravida, pellentesque eros ut, rutrum metus. ',
            'cars_brands_id' => 10,
            'cars_models_id' => 39 ,            
            'cars_body_id' => 1 ,            
            'date_production'=>'2012-01-15',
            'date_registration'=>'2012-03-10',
            'country_registration' => 'Polska',
            'power' => '150',
            'fuel_type' => 'Olej napędowy',
            'capacity'=>'1999',
            'doors_number'=>4,            
            'seats'=>5,
            'condition' =>'używany',
            'demaged'=>'0',
            'accident'=>'0',
            'contact_phone' => '123 321 123',
            'contact_email' => 'contact@email.pl',
            'users_id' => 1,            
            'price' => '26167.00',            
            'adress_ip' => '1',
            'portal_id' => '1',
            'date_start' => now(),
            'date_end' => '2020-05-12 12:34',            
            'inscription' => 'none',
            'highlighted' => '#ffffff',
            'promoted' => '0',
            'status' => 'active',
            'invoice' => 'Faktura Vat-marża'
        ]);

        //
    }
}
