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
         // Drop the table if it exists
         Schema::dropIfExists('brgy_certificate_tbls');

         // Recreate the table with updated schema
         Schema::create('brgy_certificate_tbls', function (Blueprint $table) {
             $table->id();
             $table->unsignedBigInteger('res_id');
             $table->foreign('res_id')->references('res_id')->on('resident_tbls')->onDelete('cascade');
             $table->text('cert_transactionCode');
             $table->text('cert_purpose');
             $table->date('cert_dateIssued');
             $table->date('cert_pickUpDate');
             $table->string('certStatus')->default('pending');
             $table->string('certReason')->nullable();
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
