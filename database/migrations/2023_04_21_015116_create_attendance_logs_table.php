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
            $table->unsignedBigInteger('student_id')->nullable();
            $table->unsignedBigInteger('faculty_member_id')->nullable();
            $table->unsignedBigInteger('computer_id')->nullable();
            $table->unsignedBigInteger('sy_id');
            $table->unsignedBigInteger('semester_id');
            $table->foreign('teacher_class_id')->references('id')->on('teacher_classes');
            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('faculty_member_id')->references('id')->on('faculty_members');
            $table->foreign('computer_id')->references('id')->on('computers');
            $table->foreign('sy_id')->references('id')->on('school_years');
            $table->foreign('semester_id')->references('id')->on('semesters');
            $table->string('remarks'); // present, absent, late
            $table->dateTime('time_in');
            $table->dateTime('time_out')->nullable();
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
