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
            $table->string('cert_urFname', 40)->after('res_id')->nullable();
            $table->string('cert_urMname', 40)->after('cert_urFname')->nullable();
            $table->string('cert_urLname', 40)->after('cert_urMname')->nullable();
            $table->string('cert_urSuffix', 5)->after('cert_urLname')->nullable();
            $table->date('cert_urBdate')->after('cert_urSuffix')->nullable();
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
