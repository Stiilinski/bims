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
        Schema::table('blotter_tbls', function (Blueprint $table) {
            $table->string('blotter_reason')->nullable()->after('blotter_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('blotter_tbls', function (Blueprint $table) {
            $table->dropColumn('blotter_reason');
        });
    }
};
