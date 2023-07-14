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
        Schema::create('schedule_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('date_id');
            $table->date('new_date');
            $table->time('start_time');
            $table->time('end_time');
            $table->string('status')->default('pending');
            $table->string('reason')->nullable();
            $table->string('approved_by')->nullable();
            $table->string('disapproved_by')->nullable();
            $table->dateTime('approved_at')->nullable();
            $table->dateTime('disapproved_at')->nullable();
            $table->foreign('date_id')->references('id')->on('schedule_dates')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedule_requests');
    }
};
