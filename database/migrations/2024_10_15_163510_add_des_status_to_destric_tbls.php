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
        Schema::table('destrict_tbls', function (Blueprint $table) {
            $table->string('des_status',15)->after('des_perfLabTest')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('destrict_tbls', function (Blueprint $table) {
            $table->dropColumn('des_status');
        });
    }
};
