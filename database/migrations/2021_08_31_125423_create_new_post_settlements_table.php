<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewPostSettlementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new_post_settlements', function (Blueprint $table) {
            $table->id();
            $table->string('ref', 255);
            $table->string('description_ru', 255);
            $table->string('description', 255);
            $table->string('area', 255);
            $table->string('area_description', 255);
            $table->string('area_description_ru', 255);
            $table->string('regions_description', 255);
            $table->string('regions_description_ru', 255);
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
        Schema::dropIfExists('new_post_settlements');
    }
}
