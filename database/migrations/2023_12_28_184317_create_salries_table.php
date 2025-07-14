<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->decimal('basic_salary' , 10, 2);
            $table->decimal('m_commission_usd', 10, 2)->nullable();
            $table->decimal('m_commission_pkr', 10, 2)->nullable();
            $table->decimal('dev_commission_usd', 10, 2)->nullable();
            $table->decimal('dev_commission_pkr', 10, 2)->nullable();
            $table->decimal('total_commission', 10, 2)->nullable();
            $table->decimal('bonus', 10, 2)->nullable();
            $table->decimal('advance_deduct', 10, 2)->nullable();
            $table->decimal('holiday_deduct', 10, 2)->nullable();
            $table->decimal('half_day_deduct', 10, 2)->nullable();
            $table->decimal('fine_deduct', 10, 2)->nullable();
            $table->decimal('food_deduct', 10, 2)->nullable();
            $table->decimal('paid', 10, 2)->nullable();
            $table->decimal('remaining', 10, 2)->nullable();
            $table->boolean('security_deduct')->defaultFalse();
            $table->decimal('security_clearance', 10, 2)->nullable();
            $table->decimal('holiday_compen', 10, 2)->nullable();
            $table->text('comments')->nullable();
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
        Schema::dropIfExists('salries');
    }
}
