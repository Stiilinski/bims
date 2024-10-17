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
        Schema::create('brgy_certificate_tbls', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('res_id'); // Match the data type of res_id
            $table->foreign('res_id')->references('res_id')->on('resident_tbls')->onDelete('cascade'); // Adjusted foreign key definition
            $table->text('cert_transactionCode');
            $table->text('cert_purpose');
            $table->Date('cert_dateIssued');
            $table->Date('cert_pickUpDate');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brgy_certificate_tbls');
    }
};
