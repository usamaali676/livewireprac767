<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->unsignedBigInteger('role_id');
            $table->string('password');
            $table->timestamp('last_seen')->nullable();
            $table->unsignedBigInteger('dept_id');
            $table->unsignedBigInteger('desig_id');
            $table->unsignedBigInteger('vehicle_id');
            $table->string('fatherName');
            $table->string('cnic');
            $table->string('phone');
            $table->string('offEmail');
            $table->string('perEmail')->nullable();
            $table->string('dob');
            $table->string('joindate');
            $table->string('currAddress');
            $table->string('perAddress')->nullable();
            $table->string('lastDegree');
            $table->string('currDegree')->nullable();
            $table->string('emgContactName')->nullable();
            $table->string('emgContactRelation')->nullable();
            $table->string('emgContactNumber')->nullable();
            $table->foreign('vehicle_id')->references('id')->on('vehicles');
            $table->foreign('desig_id')->references('id')->on('designations');
            $table->foreign('dept_id')->references('id')->on('departments');
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('role_id')->references('id')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
