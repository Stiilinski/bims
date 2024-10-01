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
            $table->date('opt_dob')->nullable()->after('opt_childName');
            $table->string('opt_sex', 10)->nullable()->after('opt_dob');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('opt_tbls', function (Blueprint $table) {
            $table->dropColumn(['opt_dob', 'opt_sex']);
        });
    }
};
