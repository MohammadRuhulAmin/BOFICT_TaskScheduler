<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssigntasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assigntasks', function (Blueprint $table) {
            $table->id();
            $table->string('employeeName',100);
            $table->string('task',300);
            $table->date('date')->nullable();
            $table->string('location',50)->nullable();
            $table->string('shift',50)->nullable();
            $table->time('startTime')->nullable();
            $table->time('endTime')->nullable();
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
        Schema::dropIfExists('assigntasks');
    }
}
