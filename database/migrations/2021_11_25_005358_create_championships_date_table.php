<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChampionshipsDateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('championships_date', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('championship_id')->nullable(false);
            $table->string('name')->nullable(false);
            $table->date('date_start')->nullable(false);
            $table->date('date_end')->nullable(false);
            $table->timestamps();

            $table->foreign('championship_id')->references('id')->on('championships')->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('championships_date');
    }
}
