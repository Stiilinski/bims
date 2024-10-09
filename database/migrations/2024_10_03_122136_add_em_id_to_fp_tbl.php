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
        Schema::table('fp_tbls', function (Blueprint $table) {
            $table->string('em_id', 20)->after('fp_spouseId');
            $table->foreign('em_id')->references('em_id')->on('employee_tbls')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('fp_tbls', function (Blueprint $table) {
            $table->dropForeign(['em_id']);
            $table->dropColumn('em_id');
        });
    }
};
