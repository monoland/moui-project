<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recaps', function (Blueprint $table) {
            $table->id();
            $table->text('name')->index();
            $table->text('slug')->index();
            $table->foreignId('faculty_id');
            $table->foreignId('study_id');
            $table->unsignedInteger('student_count')->default(0);
            $table->unsignedInteger('lecture_ratio')->default(0);
            $table->unsignedInteger('lecture_need')->default(0);
            $table->unsignedInteger('lecture_count')->default(0);
            $table->unsignedInteger('lecture_advg')->default(0);
            $table->unsignedInteger('lecture_lack')->default(0);
            $table->unsignedInteger('existing_ratio')->default(0);
            $table->unsignedInteger('s1_count')->default(0);
            $table->unsignedInteger('s2_count')->default(0);
            $table->unsignedInteger('s3_count')->default(0);
            $table->unsignedInteger('certified_count')->default(0);
            $table->unsignedInteger('uncertified_count')->default(0);
            $table->unsignedInteger('scholarship_count')->default(0);
            $table->unsignedInteger('position_tp')->default(0);
            $table->unsignedInteger('position_aa')->default(0);
            $table->unsignedInteger('position_lr')->default(0);
            $table->unsignedInteger('position_lk')->default(0);
            $table->unsignedInteger('position_gb')->default(0);
            $table->timestamps();

            $table->unique(['slug', 'study_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recaps');
    }
};
