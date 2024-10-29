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
            $table->dropColumn('maternal_sched');
            $table->dropColumn('epi_sched');
            $table->dropColumn('fp_sched');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sched_tbls', function (Blueprint $table) {
            $table->date('maternal_sched');
            $table->date('epi_sched');
            $table->date('fp_sched');
        });
    }
};
