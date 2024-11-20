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
            $table->dropForeign(['fp_spouseId']);
            $table->dropColumn('fp_spouseId');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('fp_tbls', function (Blueprint $table) {
            //
        });
    }
};
