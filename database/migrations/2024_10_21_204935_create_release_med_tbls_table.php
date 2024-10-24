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
        Schema::create('release_med_tbls', function (Blueprint $table) {
            $table->id('rmed_id');
            $table->unsignedBigInteger('med_id')->nullable(); // Changed to unsignedBigInteger
            $table->foreign('med_id')->references('med_id')->on('medicine_tbls')->onDelete('set null');
            $table->date('rmed_qtRelease')->nullable();
            $table->integer('rmed_Date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('release_med_tbls');
    }
};
