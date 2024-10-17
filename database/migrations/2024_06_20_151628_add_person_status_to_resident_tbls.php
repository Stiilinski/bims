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
        Schema::table('resident_tbls', function (Blueprint $table) {
            $table->string('res_personStatus', 15)->nullable()->after('res_occupation');
            $table->string('res_status', 15)->nullable()->after('res_personStatus');
            $table->string('res_sitio', 15)->nullable()->after('res_purok');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('resident_tbls', function (Blueprint $table) {
            $table->dropColumn('res_personStatus');
            $table->dropColumn('res_status');
            $table->dropColumn('res_sitio');
        });
    }
};
