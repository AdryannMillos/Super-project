<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('championship_id')->nullable(false);
            $table->string('name')->nullable(false);
            $table->enum('type', ['group_phase','classification','top32','top16','top8','top4','final'])->nullable(false);
            $table->timestamps();
            $table->softDeletes();

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
        Schema::dropIfExists('groups');
    }
}
