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
        Schema::create('professional_development_programs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('education_program_id')->constrained()->cascadeOnDelete();
            $table->string('name', 400);
            $table->date('date_approval_faculty');
            $table->date('date_approval_council');
            $table->date('date_approval_rector');
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
        Schema::dropIfExists('professional_development_programs');
    }
};
