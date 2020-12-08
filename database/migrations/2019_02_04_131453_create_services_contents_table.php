<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services_contents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50)->comment('nazwa');
            $table->string('lead', 250)->comment('krótki opis usługi którą się wykonuje do wyświetlenia na liście');
            $table->text('description')->comment('opis usługi którą się wykonuje');
            $table->integer('users_id')->unsigned()->comment('id użytkownika który dodał usługę');
            $table->integer('services_categories_id')->unsigned()->comment('kategoria usługi');
            $table->dateTime('date_start')->comment('data pojawienia się usługi na portalu (można zrobić opóźnienie)');
            $table->dateTime('date_end')->comment('data_waznosci usługi, po jakim czasie ma ogłoszenie zniknąć');
            $table->unsignedTinyInteger('recomended')->comment('czy ogłoszenie jest rekomendowane');
            $table->enum('highlighted', ['#ffffff','#cfbcf8','#bcf8bc','#f1f8bc','#f8c0bc','#f8bcf5'])->default("#ffffff")->comment('czy ogłoszenie jest wyróżnione (kolor)');
            $table->unsignedTinyInteger('promoted')->default(0)->comment('czy ogłoszenie jest promowane (przed innymi)');
            $table->integer('views')->unsigned()->default(0)->comment('ile było odsłon danego ogłoszenia, do statystyk');
            $table->unsignedTinyInteger('active')->default(0)->comment('czy ogloszenie jet aktywne (ustawiane jak cała procedura dodawania ogłoszenia dojdzie do konca)');
            $table->integer('portal_id')->coment('id portalu z którego dodano ogłoszenie');            
            $table->ipAddress('visitor_ip')->comment('ip użytkownika');
            $table->string('visitor_host', 250)->nullable($value = true)->comment('dane z hosta (rev dns) użytkownika'); //rev dns hosta użytkownika - przydtne żeby szybko zlokalizować usługodawcę
            $table->string('visitor_soft', 250)->nullable($value = true)->comment('dane przeglądarki system itd..'); //wiem że to może się wydawać zbyteczne ale czasem policji się przydaje
            $table->string('visitor_proxy', 250)->nullable($value = true)->comment('dane proxy przez które się łączył'); //wiem że to może się wydawać zbyteczne ale czasem policji się przydaje
            $table->smallInteger('visitor_port')->unsigned();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services_contents');
    }
}
