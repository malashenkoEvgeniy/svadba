<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->char('logo', 255)->nullable();
            $table->char('email', 100);
            $table->char('email_for_forms', 100)->nullable();
            $table->char('phone_1', 100);
            $table->char('phone_2', 100)->nullable();
            $table->char('phone_social', 50)->nullable();
            $table->char('telegram', 50)->nullable();
            $table->char('viber', 50)->nullable();
            $table->char('fb', 100)->nullable();
            $table->char('instagram', 100)->nullable();
            $table->char('working_house', 100)->nullable();
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
        Schema::dropIfExists('contacts');
    }
}
