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
        Schema::table('sched_tbls', function (Blueprint $table) {
            $table->unsignedBigInteger('ap_id')->after('vt_id')->nullable(); 
            $table->foreign('ap_id')->references('ap_id')->on('antepartum_tbls')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sched_tbls', function (Blueprint $table) {
            //
        });
    }
};
