<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVersionColumnsToTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $tables = [
            'roles',
            'users',
            'vehicles',
            'securities',
            'salries',
            'sales',
            'holiday_cycles',
            'fines',
            'designations',
            'departments',
            'comments',
            'advances',
        ];

        foreach ($tables as $table) {
            Schema::table($table, function (Blueprint $table) {
                $table->unsignedInteger('version')->default(1);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $tables = [
            'roles',
            'users',
            'vehicles',
            'securities',
            'salries',
            'sales',
            'holiday_cycles',
            'fines',
            'designations',
            'departments',
            'comments',
            'advances',
        ];

        foreach ($tables as $table) {
            Schema::table($table, function (Blueprint $table) {
                $table->dropColumn('version');
            });
        }

    }
}
