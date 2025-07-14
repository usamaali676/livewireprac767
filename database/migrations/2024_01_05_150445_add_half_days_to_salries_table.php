<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHalfDaysToSalriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('salries', function (Blueprint $table) {
            $table->bigInteger('unpaid_days')->nullable();
            $table->bigInteger('half_days')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('salries', function (Blueprint $table) {
            //
        });
    }
}
