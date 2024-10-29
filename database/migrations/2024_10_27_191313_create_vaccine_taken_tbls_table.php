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
        Schema::create('vaccine_taken_tbls', function (Blueprint $table) {
            $table->id('vt_id');
            $table->unsignedBigInteger('epi_id')->nullable(); 
            $table->foreign('epi_id')->references('epi_id')->on('epi_record_tbls')->onDelete('cascade');
            $table->date('vt_date')->nullable();
            $table->double('vt_wt')->nullable();
            $table->string('vt_vaccines', 50)->nullable();
            $table->string('vt_status', 15)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vaccine_taken_tbls');
    }
};
