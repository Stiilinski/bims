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
        Schema::table('daily_service_rec_tbls', function (Blueprint $table) {
            $table->text('dsr_signatureBrgy')->after('dsr_signature')->nullable();
            $table->text('dsr_signatureLgu')->after('dsr_signature')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('daily_service_rec_tbls', function (Blueprint $table) {
            $table->dropColumn('dsr_signatureBrgy');
            $table->dropColumn('dsr_signatureLgu');
        });
    }
};
