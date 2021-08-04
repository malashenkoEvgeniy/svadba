<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMainPageTranslatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('main_page_translates', function (Blueprint $table) {
            $table->id();
            $table->text('title')->nullable();
            $table->text('body')->nullable();
            $table->char('language', 10)->default('ru');
            $table->char('seo_title', 255)->nullable();
            $table->text('seo_description')->nullable();
            $table->text('seo_keywords')->nullable();
            $table->bigInteger('main_page_id')->unsigned();
            $table->foreign('main_page_id')->references('id')->on('main_pages')->onDelete('cascade');
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
        Schema::dropIfExists('main_page_translates');
    }
}
