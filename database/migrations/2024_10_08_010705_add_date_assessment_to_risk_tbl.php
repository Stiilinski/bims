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
        Schema::table('risk_tbls', function (Blueprint $table) {
            $table->date('risk_dateAss')->after('risk_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('risk_tbls', function (Blueprint $table) {
            $table->dropColumn('risk_dateAss');
        });
    }
};
