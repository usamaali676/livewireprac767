<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonthlyHolidaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monthly_holidays', function (Blueprint $table) {
            $table->id();
            $table->foreignId('holiday_cycle_id')->constrained();
            $table->foreignId('year_id')->constrained();
            $table->string('month');
            $table->string('holidays');
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
        Schema::dropIfExists('monthly_holidays');
    }
}
