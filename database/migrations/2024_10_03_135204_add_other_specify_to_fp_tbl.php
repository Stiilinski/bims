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
            $table->string('fp_otherMethod', 50)->after('fp_methodCurUse');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('fp_tbls', function (Blueprint $table) {
            $table->dropColumn('dstb_status');
        });
    }
};
