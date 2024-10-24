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
        Schema::table('release_med_tbls', function (Blueprint $table) {
            $table->integer('rmed_qtRelease')->after('med_id')->nullable();
            $table->date('rmed_Date')->after('rmed_qtRelease')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('release_med_tbls', function (Blueprint $table) {
            $table->dropColumn('rmed_qtRelease');
            $table->dropColumn('rmed_Date');
        });
    }
};
