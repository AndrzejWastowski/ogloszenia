<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateEstatesContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estates_contents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 150)->comment('nazwa / temat nieruchomosci');
            $table->string('lead', 255)->comment('krotki opis nieruchomosci - do wyswietlania na liscie podstawowej 256 znaków max');
            $table->text('description')->comment('długi opis');
            $table->integer('estates_groups_id')->comment('grupa ogłoszeń');
            $table->integer('estates_categories_id')->comment('kategoria ogłoszenia');
            $table->integer('area')->comment('powierzchnia ');
            $table->enum('unit', ['mkw','ar','hektar'])->comment('powierzchnia ');
            $table->enum('market', ['pierwotny','wtórny'])->comment('typ ogłoszenia, sprzedak kupie zamienie itd..');
            $table->decimal('price', 10, 2)->comment('cena');
            $table->integer('users_id')->comment('id użytkownika który dodał ogłoszenie ');
            $table->unsignedTinyInteger('active')->default(0)->comment('czy ogloszenie jet aktywne (ustawiane jak cała procedura dodawania ogłoszenia dojdzie do konca)');
            $table->unsignedTinyInteger('recomended')->comment('czy ogłoszenie jest rekomendowane');
            $table->enum('highlighted', ['#ffffff','#cfbcf8','#bcf8bc','#f1f8bc','#f8c0bc','#f8bcf5'])->default("#ffffff")->comment('czy ogłoszenie jest wyróżnione (kolor)');
            $table->unsignedTinyInteger('promoted')->comment('czy ogłoszenie jest promowane (przed innymi)');
            
            $table->decimal('lat', 12, 10)->nullable()->comment('szerokość geograficzna - do map');
            $table->decimal('lng', 12, 10)->nullable()->comment('długość geograficzna - do map');           
           
            $table->integer('views')->unsigned()->default(0)->comment('ile było odsłon danego ogłoszenia, do statystyk');            
            
            $table->string('contact_phone',100)->nullable()->comment('kontakt tel do sprzedawcy');  
            $table->string('contact_email',200)->nullable()->comment('kontakt e-mail do sprzedawcy');  

            $table->integer('adresses_id')->comment('id adresu ktory bedzie sie pojawiał przy kontakcie w sprawie tego ogłoszenia');


            $table->enum('status',['unfinished','active','disabled','removed','blocked'])->default('unfinished')->comment('active - normalne opłacone ogłoszenie, disabled - wyłaczone przez uzytkownika lub z wygasłym terminem, mozliwe do ponowienia, removed - usunięte przez moderatora, nie wyświetla się użytkownikowi, blocked - zablokowane do wyjaśnienia do wyjasnienia, nie mozna go ponowić');
            $table->timestamp('date_add')->useCurrent()->comment('data dodania ogłoszenia');
            $table->dateTime('date_start')->comment('data pojawienia się ogłoszenia na portalu (można zrobić opóźnienie)');
            $table->dateTime('date_end')->comment('data_waznosci');
            
            $table->integer('portal_id')->comment('id portalu z którego dodano ogłoszenie');
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
        Schema::dropIfExists('estates_contents');
    }
}
