<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTextileTranslatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('textile_translates', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->char('language', 10);
            $table->bigInteger('textile_id')->unsigned();
            $table->foreign('textile_id')->references('id')->on('textiles')->onDelete('cascade');
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
        Schema::dropIfExists('textile_translates');
    }
}
