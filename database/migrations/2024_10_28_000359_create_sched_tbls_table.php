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
        Schema::create('sched_tbls', function (Blueprint $table) {
            $table->id('sched_id');
            $table->date('maternal_sched')->nullable();
            $table->date('epi_sched')->nullable();
            $table->date('fp_sched')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sched_tbls');
    }
};
