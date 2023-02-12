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
        Schema::create('course_study_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('srudent_id')->constrained('students', 'id')->cascadeOnDelete();
            $table->foreignId('course_id')->constrained('courses', 'id')->cascadeOnDelete();
            $table->foreignId('group_id')->constrained('groups', 'id')->cascadeOnDelete();
            $table->date('date_start_study');
            $table->date('date_finish_study');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_study_items');
    }
};
