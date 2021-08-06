<?php

use App\Models\Category;
use Illuminate\Database\Migrations\Migration;

class AddDataCategoriesTablel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        (new Category())->creat('Свадебные платья');
        (new Category())->creat('Вечерние платья');
        (new Category())->creat('Аксессуары');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
