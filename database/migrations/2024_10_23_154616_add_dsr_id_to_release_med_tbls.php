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
        Schema::table('release_med_tbls', function (Blueprint $table) {
            $table->unsignedBigInteger('dsr_id')->after('rmed_id')->nullable(); 
            $table->foreign('dsr_id')->references('dsr_id')->on('daily_service_rec_tbls')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('release_med_tbls', function (Blueprint $table) {
            $table->dropColumn('dsr_id');
        });
    }
};
