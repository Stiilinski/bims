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
        Schema::table('vaccine_taken_tbls', function (Blueprint $table) {
            $table->string('em_id', 50)->after('vt_status')->nullable(); 
            $table->foreign('em_id')->references('em_id')->on('employee_tbls')->onDelete('cascade'); 
            $table->unsignedBigInteger('sched_id')->after('epi_id')->nullable(); 
            $table->foreign('sched_id')->references('sched_id')->on('sched_tbls')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vaccine_taken_tbls', function (Blueprint $table) {
            //
        });
    }
};
