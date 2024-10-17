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
        Schema::dropIfExists('transaction_tbls');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('transaction_tbls', function (Blueprint $table) {
            // Define the table schema if needed
            $table->id();
            $table->unsignedBigInteger('cert_id')->nullable(); 
            $table->foreign('cert_id')->references('id')->on('brgy_certificate_tbls')->onDelete('cascade');
            $table->unsignedBigInteger('bcl_id')->nullable(); 
            $table->foreign('bcl_id')->references('bcl_id')->on('brgy_clearance_tbls')->onDelete('cascade');
            $table->unsignedBigInteger('business_id')->nullable();
            $table->foreign('business_id')->references('id')->on('business_brgy_clearance_tbls')->onDelete('cascade');
            $table->unsignedBigInteger('blotter_id')->nullable();
            $table->foreign('blotter_id')->references('blotter_id')->on('blotter_tbls')->onDelete('cascade');
            $table->text('tr_residenceCertNum')->nullable();
            $table->text('tr_orNum')->nullable();
            $table->decimal('tr_amountPaid', 10, 2)->nullable();
            $table->date('tr_date')->nullable();
            $table->timestamps();
        });
    }
};
