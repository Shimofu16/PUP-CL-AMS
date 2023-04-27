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
        Schema::create('attendance_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('teacher_class_id');
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('computer_id');
            $table->foreign('teacher_class_id')->references('id')->on('teacher_classes');
            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('computer_id')->references('id')->on('computers');
            $table->string('status'); // present, absent, late
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendance_logs');
    }
};
