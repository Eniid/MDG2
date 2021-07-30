<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('editions', function (Blueprint $table) {
            $table->id();
            $table->string('edition_number');
            $table->string('edition_date');

            $table->string('price')->default('6€');
            $table->string('kids_price')->default('gratuit');
            $table->string('adress')->default('Val Saint Lambert Esplanade du Val, 4100 Seraing');
            $table->string('place');
            $table->string('google_map');
            $table->string('bigining_date')->nullable;
            $table->string('ending_date')->nullable;
            $table->string('aprox_date');
            $table->string('Note');

            $table->string('catch')->nullable;
            $table->string('presentation')->nullable;


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('editions');
    }
}
