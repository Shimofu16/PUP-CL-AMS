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
        Schema::create('schedule_dates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('teacher_class_id');
            $table->date('date');
            $table->boolean('isAddedOrRescheduled')->default(0);
            $table->time('start_time');
            $table->time('end_time');
            $table->foreign('teacher_class_id')->references('id')->on('teacher_classes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedule_dates');
    }
};
