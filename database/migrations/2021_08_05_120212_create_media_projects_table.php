<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media_projects', function (Blueprint $table) {
            $table->id();
            $table->string('img_prev')->nullable();
            $table->string('img_f')->nullable();
            $table->string('img_d')->nullable();
            $table->string('img_t')->nullable();
            $table->string('img_m')->nullable();

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
        Schema::dropIfExists('media_projects');
    }
}
