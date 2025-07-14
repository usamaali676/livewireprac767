<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('role_id')->unsigned();
            $table->boolean('create')->default(0);
            $table->boolean('view')->default(0);
            $table->boolean('edit')->default(0);
            $table->boolean('update')->default(0);
            $table->boolean('delete')->default(0);
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
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
        Schema::dropIfExists('perms');
    }
}
