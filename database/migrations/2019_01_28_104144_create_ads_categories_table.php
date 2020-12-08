<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdsCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /* abela zawierająca głowne kategorie w ogłoszeniach drobnych */
        Schema::create('ads_categories', function (Blueprint $table) {
            $table->increments('id')->comment('unikatowy identyfikator');
            $table->string('name', 75)->comment('nazwa kategorii');
            $table->string('link', 75)->comment('link na jaki kategoria jest zamieniana (bez pl znaków itd)');
            $table->string('icon', 75)->comment('ikona wyświetlana przy kategorii, z globalnego repozystorium ');
            $table->integer('popular')->comment('czy taktgoria ma sie pojawiac w najpopularniejszych (do ograniczania list)');
            $table->string('description', 250)->comment('opis, taki skrócony / przykładowy - żeby cielaczki wiedziały co gdzie wpisywać');
        });

        // DB::statement('ALTER TABLE `ads_categories` comment = "Tabela zawierająca głowne kategorie w ogłoszeniach drobnych"');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ads_categories');
    }
}
