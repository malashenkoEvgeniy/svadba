<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewPostWarehousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new_post_warehouses', function (Blueprint $table) {
            $table->id();
            $table->string('ref', 255);
            $table->string('settlement_ref', 255);
            $table->string('description_ru', 255);
            $table->string('description', 255);
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
        Schema::dropIfExists('new_post_warehouses');
    }
}
