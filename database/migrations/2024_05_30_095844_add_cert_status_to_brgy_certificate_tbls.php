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
        Schema::table('brgy_certificate_tbls', function (Blueprint $table) {
            $table->string('certStatus')->default('pending')->after('cert_pickUpDate');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('brgy_certificate_tbls', function (Blueprint $table) {
            $table->dropColumn('certStatus');
        });
    }
};
