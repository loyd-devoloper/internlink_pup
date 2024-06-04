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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('job_id');
            $table->unsignedBigInteger('student_id');
            $table->string('fullname');
            $table->string('email');
            $table->string('contact_number');
            $table->string('resume_type')->default('1');
            $table->string('resume')->nullable(); // nullable because of the conditional hidden field
            $table->string('endorsement_letter');
            $table->string('internship_agreement');
            $table->string('insurance');
            $table->string('status')->default(2);
            $table->string('message')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
