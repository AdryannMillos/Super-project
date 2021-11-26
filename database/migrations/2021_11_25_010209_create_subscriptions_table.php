<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('player_id')->nullable(false);
            $table->integer('championship_id')->nullable(false);
            $table->string('decklist')->nullable(false);
            $table->enum('last_position', ['GROUP_PHASE','TOP32','TOP16','TOP8','TOP4','SECOND','CHAMPION'])->nullable(false);
            $table->timestamps();

            $table->foreign('player_id')->references('id')->on('players')->restrictOnDelete();
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
        Schema::dropIfExists('subscriptions');
    }
}
