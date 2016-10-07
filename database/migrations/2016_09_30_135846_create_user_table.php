<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->bigInteger('ssn')->unsigned()->primary();
            $table->string('name');
            $table->string('surname');
            $table->char('gender', 1);
            $table->string('email');
            $table->string('address');
            $table->string('phone_no');

            // $table->string('username'); // Use email instead.
            $table->string('password');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user');
    }
}
