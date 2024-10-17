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
        Schema::create('daily_service_rec_tbls', function (Blueprint $table) {
            $table->id('dsr_id');
            $table->date('dsr_dateVisit')->nullable();
            $table->unsignedBigInteger('res_id'); // Changed to unsignedBigInteger
            $table->foreign('res_id')->references('res_id')->on('resident_tbls')->onDelete('cascade'); 
            $table->double('dsr_bp')->nullable();
            $table->double('dsr_temp')->nullable();
            $table->double('dsr_ht')->nullable();
            $table->double('dsr_wt')->nullable();
            $table->text('dsr_complaint')->nullable();
            $table->string('dsr_smoke', 10)->nullable();
            $table->string('dsr_alcohol', 10)->nullable();
            $table->unsignedBigInteger('med_id')->nullable(); // Changed to unsignedBigInteger
            $table->foreign('med_id')->references('med_id')->on('medicine_tbls')->onDelete('set null');
            $table->integer('dsr_qt')->nullable();
            $table->string('dsr_status', 20)->default('Completed');
            $table->text('dsr_signature')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daily_service_rec_tbls');
    }
};
