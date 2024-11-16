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
            $table->enum('cert_type', ['Indigency', 'Certification', 'First Time Job Seeker', 'Good Moral'])->after('cert_purpose')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('brgy_certificate_tbls', function (Blueprint $table) {
            //
        });
    }
};
