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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('status')->default('offline'); // online, offline, deactivated
            $table->unsignedBigInteger('role_id');
            $table->unsignedBigInteger('student_id')->nullable();
            $table->unsignedBigInteger('faculty_member_id')->nullable();
            $table->boolean('force_change_password')->default(false);
            $table->foreign('role_id')->references('id')->on('roles');
            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('faculty_member_id')->references('id')->on('faculty_members');
            $table->softDeletes();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
