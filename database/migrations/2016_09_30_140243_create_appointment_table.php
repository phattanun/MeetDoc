<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointment', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->char('time', 1);
            $table->string('symptom');
            $table->string('queue_status');
            $table->timestamp('checkin_time')->nullable();
            $table->char('type', 1);

            $table->bigInteger('doctor_ssn')->unsigned();
            $table->bigInteger('patient_ssn')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('appointment');
    }
}
