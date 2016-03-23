<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');

            // Cached from social
            $table->string('name')->nullable();
            $table->string('surname')->nullable();
            $table->string('social_id')->nullable();
            $table->string('email')->unique();
            $table->string('avatar')->nullable();

            $table->string('shortStory')->nullable();
            $table->string('password', 60)->nullable();

            $table->rememberToken();
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
        Schema::drop('users');
    }
}
