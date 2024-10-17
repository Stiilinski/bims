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
        Schema::table('opt_tbls', function (Blueprint $table) {
            $table->double('opt_ageFirst')->nullable()->change();
            $table->double('opt_ageSec')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('opt_tbls', function (Blueprint $table) {
            $table->integer('opt_ageFirst')->nullable()->change();
            $table->integer('opt_ageSec')->nullable()->change();
        });
    }
};
