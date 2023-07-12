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
        Schema::create('teacher_classes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('teacher_id');
            $table->unsignedBigInteger('subject_id');
            $table->unsignedBigInteger('section_id');
            $table->unsignedBigInteger('sy_id');
            $table->unsignedBigInteger('semester_id');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('color');
            $table->foreign('teacher_id')->references('id')->on('faculty_members');
            $table->foreign('subject_id')->references('id')->on('subjects');
            $table->foreign('section_id')->references('id')->on('sections');
            $table->foreign('sy_id')->references('id')->on('school_years');
            $table->foreign('semester_id')->references('id')->on('semesters');
            $table->softDeletes();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teacher_classes');
    }
};
