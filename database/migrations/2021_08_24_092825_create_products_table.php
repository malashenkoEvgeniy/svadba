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
            $table->char('slug',150);
            $table->integer('price')->default(0);
            $table->integer('new_price')->default(0);
            $table->tinyInteger('is_promotion')->default(0);
            $table->tinyInteger('is_new')->default(0);
            $table->tinyInteger('is_collection')->default(0);
            $table->bigInteger('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->bigInteger('brand_id')->unsigned();
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->bigInteger('silhouette_id')->unsigned();
            $table->foreign('silhouette_id')->references('id')->on('silhouettes')->onDelete('cascade');
            $table->bigInteger('textile_id')->unsigned();
            $table->foreign('textile_id')->references('id')->on('textiles')->onDelete('cascade');
            $table->integer('available')->default(0);
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
