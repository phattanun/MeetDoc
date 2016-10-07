<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDateDimTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('date_dim', function (Blueprint $table) {
            $table->integer('datekey')->unsigned()->primary();
            $table->date('date');
            $table->char('day_of_week', 9);
            $table->integer('day')->unsigned();
            $table->integer('month')->unsigned();
            $table->integer('year')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('date_dim');
    }
}
