<?php

use Illuminate\Database\Seeder;

class EstatesCategoriesSeeds extends Seeder
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
        DB::table('estates_categories')->insert([
            'name'=> 'Powierzchnia biurowa',
            'link'=> 'powierzchnia_biurowa',
            'estates_groups_id'=> 2,
            'icon'=> '',
            'popular'=> 1,
            'description'=> 'powierzchnia biurowa'
        ]);

        DB::table('estates_categories')->insert([
            'name'=> 'Sklepy',
            'link'=> 'sklepy',
            'estates_groups_id'=> 2,
            'icon'=> '',
            'popular'=> 1,
            'description'=> 'sprzdam sklep / firmę'
        ]);

        DB::table('estates_categories')->insert([
            'name'=> 'Stoiska Handlowe',
            'link'=> 'stoiska_handlowe',
            'estates_groups_id'=> 2,
            'icon'=> '',
            'popular'=> 1,
            'description'=> 'stoiska handlowe'
        ]);

        DB::table('estates_categories')->insert([
            'name'=> 'Tereny Inwestycyjne',
            'link'=> 'tereny_insestycyjne',
            'estates_groups_id'=> 2,
            'icon'=> '',
            'popular'=> 1,
            'description'=> 'tereny pod sklep, biuro, firmę, magazyn'
        ]);
           

        DB::table('estates_categories')->insert([
            'name'=> 'Magazyny',
            'link'=> 'magazyny',
            'estates_groups_id'=> 2,
            'icon'=> '',
            'popular'=> 1,
            'description'=> 'powierzchnia magazynowa, budynki magazynowe'
        ]);
               
        
        DB::table('estates_categories')->insert([
            'name'=> 'Mieszkania',
            'link'=> 'mieszkania',
            'estates_groups_id'=> 1,
            'icon'=> '',
            'popular'=> 1,
            'description'=> 'sprzedam mieszkanie '
        ]);


        DB::table('estates_categories')->insert([
            'name'=> 'Domy',
            'link'=> 'domy',
            'estates_groups_id'=> 1,
            'icon'=> '',
            'popular'=> 1,
            'description'=> 'Sprzedam dom mieszkalny'
        ]);


        DB::table('estates_categories')->insert([
            'name'=> 'Działki Budowlane',
            'link'=> 'dzialki_budowlane',
            'estates_groups_id'=> 1,
            'icon'=> '',
            'popular'=> 1,
            'description'=> 'sprzedam działkę budowlaną pod dom'
        ]);


        DB::table('estates_categories')->insert([
            'name'=> 'Garaże',
            'link'=> 'garaze',
            'estates_groups_id'=> 1,
            'icon'=> '',
            'popular'=> 1,
            'description'=> 'sprzedam garaż'
        ]);

        DB::table('estates_categories')->insert([
            'name'=> 'Działki rekreacyjne',
            'link'=> 'dzialki_rekreacyjne',
            'estates_groups_id'=> 1,
            'icon'=> '',
            'popular'=> 1,
            'description'=> 'sprzedam działkę rekreacyjną'
        ]);


        DB::table('estates_categories')->insert([
            'name'=> 'Wynajem mieszkan',
            'link'=> 'wynajem_mieszkan',
            'estates_groups_id'=> 3,
            'icon'=> '',
            'popular'=> 1,
            'description'=> 'Wynajmę mieszkanie'
        ]);

        DB::table('estates_categories')->insert([
            'name'=> 'Wynajem biur',
            'link'=> 'wynajem_biur',
            'estates_groups_id'=> 3,
            'icon'=> '',
            'popular'=> 1,
            'description'=> 'Wynajmę pomieszczenie biurowe'
        ]);

        DB::table('estates_categories')->insert([
            'name'=> 'Powierzchnia handlowa',
            'link'=> 'powierzchnia_handlowa',
            'estates_groups_id'=> 3,
            'icon'=> '',
            'popular'=> 1,
            'description'=> 'Wynajmę powierzchnię handlową'
        ]);

        DB::table('estates_categories')->insert([
            'name'=> 'Wynajmę magazyn',
            'link'=> 'wynajem_magazyn',
            'estates_groups_id'=> 3,
            'icon'=> '',
            'popular'=> 1,
            'description'=> 'Wynajmę magazyn, powierzchnię magazynową'
        ]);

        DB::table('estates_categories')->insert([
            'name'=> 'Parkingi',
            'link'=> 'parkingi',
            'estates_groups_id'=> 3,
            'icon'=> '',
            'popular'=> 1,
            'description'=> 'Wynajmę parking'
        ]);
    }
}
