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
        Schema::create('resumes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->string('firstname')->required();

            $table->string('middlename')->required();

            $table->string('lastname')->required();

            $table->string('profile')->nullable();

            $table->string('linkedin')->nullable();

            $table->string('github')->nullable();

            $table->string('facebook')->nullable();

            $table->string('mobile_phone')->nullable();

            $table->string('course')->nullable();

            $table->string('student_number')->nullable();
            $table->string('address')->nullable();
            $table->text('about_me')->nullable();


            $table->string('e_school_name')->nullable();

            $table->string('e_start')->nullable();

            $table->string('e_end')->nullable();


            $table->string('j_school_name')->nullable();

            $table->string('j_start')->nullable();

            $table->string('j_end')->nullable();


            $table->string('s_school_name')->nullable();

            $table->string('s_start')->nullable();

            $table->string('s_end')->nullable();


            $table->string('c_school_name')->nullable();

            $table->string('c_start')->nullable();

            $table->string('certificate_name1')->nullable();
            $table->string('certificate_name2')->nullable();
            $table->string('certificate_name3')->nullable();
            $table->string('certificate_name4')->nullable();
            $table->string('certificate_name5')->nullable();


            $table->string('pskill1')->nullable();

            $table->integer('prating1')->nullable();

            $table->string('pskill2')->nullable();

            $table->integer('prating2')->nullable();

            $table->string('pskill3')->nullable();

            $table->integer('prating3')->nullable();

            $table->string('pskill4')->nullable();

            $table->integer('prating4')->nullable();

            $table->string('pskill5')->nullable();

            $table->integer('prating5')->nullable();


            $table->string('hskill1')->nullable();

            $table->integer('hrating1')->nullable();

            $table->string('hskill2')->nullable();

            $table->integer('hrating2')->nullable();

            $table->string('hskill3')->nullable();

            $table->integer('hrating3')->nullable();

            $table->string('hskill4')->nullable();

            $table->integer('hrating4')->nullable();

            $table->string('hskill5')->nullable();

            $table->integer('hrating5')->nullable();


            $table->string('sskill1')->nullable();

            $table->integer('srating1')->nullable();

            $table->string('sskill2')->nullable();

            $table->integer('srating2')->nullable();

            $table->string('sskill3')->nullable();

            $table->integer('srating3')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resumes');
    }
};
