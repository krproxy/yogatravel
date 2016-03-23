<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePointImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('point_images', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('yoga_point_id')->unsigned();
            $table->foreign('yoga_point_id')
                ->references('id')->on('yoga_points')
                ->onDelete('cascade');

            $table->string('name');
            $table->string('alt');

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
        Schema::drop('point_images');
    }
}
