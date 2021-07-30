<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();

            $table->string('mdg_title');
            $table->longText('mdg_desc');
            $table->string('mdg_img');

            $table->string('why_title');
            $table->longText('why_desc');
            $table->string('why_img');

            $table->string('rotari_title');
            $table->longText('rotari_desc');
            $table->string('rotari_img');


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
        Schema::dropIfExists('abouts');
    }
}
