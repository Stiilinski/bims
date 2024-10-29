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
            $table->dropForeign(['sched_id']);
            $table->dropColumn('sched_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vaccine_taken_tbls', function (Blueprint $table) {
            $table->unsignedBigInteger('sched_id');
        });
    }
};
