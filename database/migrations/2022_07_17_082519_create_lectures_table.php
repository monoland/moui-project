<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lectures', function (Blueprint $table) {
            $table->id();
            $table->text('nik')->index()->nullable();
            $table->text('nidn')->index()->nullable();
            $table->text('name');
            $table->text('slug')->unique();
            $table->text('degree_fr')->nullable();
            $table->text('degree_bc')->nullable();
            $table->enum('gender', ['L', 'P'])->index()->nullable();
            $table->text('born_place')->index()->nullable();
            $table->date('born_date')->index()->nullable();
            $table->foreignId('position_id');
            $table->foreignId('faculty_id');
            $table->foreignId('study_id');
            $table->enum('education_lv', ['S1', 'S2', 'S3'])->index()->nullable();
            $table->foreignId('university_id')->nullable();
            $table->text('sk_number')->nullable();
            $table->date('sk_date')->nullable();
            $table->foreignId('scholarship_id')->nullable();
            $table->date('scholarship_st')->nullable();
            $table->date('scholarship_fn')->nullable();
            $table->text('certi_regist')->nullable();
            $table->text('certi_number')->nullable();
            $table->date('certi_date')->nullable();
            $table->date('functional_date')->nullable();
            $table->date('inffasing_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lectures');
    }
};
