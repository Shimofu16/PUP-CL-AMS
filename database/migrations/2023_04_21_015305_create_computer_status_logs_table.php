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
        Schema::create('computer_status_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('computer_id');
            $table->foreign('computer_id')->references('id')->on('computers');
            $table->string('status'); // Available, Not Available, Broken
            $table->string('description');
            $table->timestamp('checked_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('computer_status_logs');
    }
};
