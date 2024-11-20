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
            $table->string('spouse_name',100)->after('fp_clientId')->nullable();
            $table->date('spouse_dob')->after('spouse_name')->nullable();
            $table->string('spouse_occupation',100)->after('spouse_dob')->nullable();
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
