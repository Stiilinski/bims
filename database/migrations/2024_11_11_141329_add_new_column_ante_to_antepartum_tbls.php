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
        Schema::table('antepartum_tbls', function (Blueprint $table) {
            $table->string('ap_treatment', 150)->after('ap_diagnosis')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('antepartum_tbls', function (Blueprint $table) {
            $table->dropColumn('ap_treatment');
        });
    }
};
