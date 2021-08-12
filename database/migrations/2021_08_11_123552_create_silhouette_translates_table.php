<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSilhouetteTranslatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('silhouette_translates', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->char('language', 10);
            $table->bigInteger('silhouette_id')->unsigned();
            $table->foreign('silhouette_id')->references('id')->on('silhouettes')->onDelete('cascade');
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
        Schema::dropIfExists('silhouette_translates');
    }
}
