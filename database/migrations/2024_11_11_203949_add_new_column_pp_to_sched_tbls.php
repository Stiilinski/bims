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
            $table->unsignedBigInteger('pp_id')->after('ap_id')->nullable(); 
            $table->foreign('pp_id')->references('pp_id')->on('postpartum_tbls')->onDelete('cascade');
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
