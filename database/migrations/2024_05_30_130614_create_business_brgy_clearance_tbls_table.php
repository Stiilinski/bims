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
        Schema::create('business_brgy_clearance_tbls', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('res_id'); // Match the data type of res_id
            $table->foreign('res_id')->references('res_id')->on('resident_tbls')->onDelete('cascade'); // Adjusted foreign key definition
            $table->text('bc_transactionCode');
            $table->text('bc_businessName');
            $table->text('bc_businessAddress');
            $table->text('bc_businessType');
            $table->text('bc_businessNature');
            $table->text('bc_dateIssued');
            $table->text('bc_pickUpDate');
            $table->text('bc_status');
            $table->text('bc_reason')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_brgy_clearance_tbls');
    }
};
