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
            $table->foreignId('teacher_class_id')->constrained('teacher_classes');
            $table->string('date');
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->string('status')->default('pending');
            $table->string('reason')->nullable();
            $table->string('remarks')->nullable();
            $table->string('approved_by')->nullable();
            $table->string('disapproved_by')->nullable();
            $table->date('approved_at')->nullable();
            $table->date('disapproved_at')->nullable();
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
