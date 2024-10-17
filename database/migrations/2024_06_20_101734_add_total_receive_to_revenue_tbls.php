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
        Schema::table('revenue_tbls', function (Blueprint $table) {
            $table->float('rev_amountReceive')->nullable()->after('rev_amount');
            $table->float('rev_verification')->nullable()->after('rev_amountReceive');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('revenue_tbls', function (Blueprint $table) {
            //
        });
    }
};
