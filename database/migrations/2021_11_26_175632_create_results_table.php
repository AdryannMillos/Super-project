<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('match_id')->nullable(false);
            $table->integer('subscription_group_id')->nullable(false);
            $table->integer('result')->nullable(true);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('subscription_group_id')->references('id')->on('subscriptions')->restrictOnDelete();
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
        Schema::dropIfExists('results');
    }
}
