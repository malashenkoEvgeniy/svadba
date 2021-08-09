<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->char('vendor_code',255);
//            $table->boolean('aviability')->default(0);
            $table->char('slug',150);
            $table->integer('price')->default(0);
            $table->integer('new_price')->default(0);
            $table->tinyInteger('is_promotion')->default(0);
            $table->tinyInteger('is_new')->default(0);
            $table->tinyInteger('is_collection')->default(0);
            $table->bigInteger('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
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
        Schema::dropIfExists('products');
    }
}
