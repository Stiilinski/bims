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
            $table->string('res_educ', 80)->after('res_sex')->nullable();
            $table->string('res_religion', 50)->after('res_civil')->nullable();
            $table->string('res_otherContact', 15)->after('res_contact')->nullable();
            $table->string('res_tempAddress', 80)->after('res_address')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('resident_tbls', function (Blueprint $table) {
            //
        });
    }
};
