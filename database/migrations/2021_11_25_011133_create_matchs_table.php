<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matchs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('subscription_group_one_id')->nullable(false);
            $table->integer('subscription_group_two_id')->nullable(false);
            $table->timestamps();
    
            $table->foreign('subscription_group_one_id')->references('id')->on('subscription_groups')->restrictOnDelete();
            $table->foreign('subscription_group_two_id')->references('id')->on('subscription_groups')->restrictOnDelete();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matchs');
    }
}
