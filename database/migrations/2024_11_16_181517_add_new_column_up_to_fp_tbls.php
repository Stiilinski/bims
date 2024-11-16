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
            $table->string('fp_phNum', 40)->after('em_id')->nullable();
            $table->enum('fp_nhts', ['Yes', 'No'])->after('fp_phNum')->nullable();
            $table->enum('fp_4ps', ['Yes', 'No'])->after('fp_nhts')->nullable();
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
