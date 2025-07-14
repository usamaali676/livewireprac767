<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->string('type');
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('file_path');
            $table->string('month');
            $table->enum('status', ['Pending', 'Sent', 'Approved', 'Reject'])->default('Pending');
            $table->text('reject_note')->nullable();
            $table->timestamps();
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
