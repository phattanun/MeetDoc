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
            $table->char('type', 1);
            $table->timestamp('checkin_time')->nullable();
            $table->longText('description')->nullable();
            $table->double('weight')->nullable();
            $table->double('height')->nullable();
            $table->double('systolic')->nullable();
            $table->double('diastolic')->nullable();
            $table->double('temperature')->nullable();
            $table->integer('heart_rate')->nullable();

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
