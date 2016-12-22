<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateYogaPointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yoga_points', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id')->unsigned();

            $table->string('latitude');
            $table->string('longitude');
            $table->string('address');
            $table->string('description');
            $table->string('type');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('yoga_points');
    }
}
