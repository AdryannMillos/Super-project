<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLivestreamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livestreams', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable(false);
            $table->datetime('date')->nullable(false);
            $table->string('link')->nullable(true);
            $table->integer('match_id')->nullable(true);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('match_id')->references('id')->on('matchs')->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('livestreams');
    }
}
