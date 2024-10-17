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
        Schema::create('brgy_clearance_tbls', function (Blueprint $table) {
            $table->id('bcl_id');
            $table->unsignedBigInteger('res_id'); // Match the data type of res_id
            $table->foreign('res_id')->references('res_id')->on('resident_tbls')->onDelete('cascade'); // Adjusted foreign key definition
            $table->text('bcl_transactionCode');
            $table->text('bcl_purpose');
            $table->text('bcl_dateIssued');
            $table->text('bcl_pickUpDate');
            $table->text('bcl_status');
            $table->text('bcl_reason')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brgy_clearance_tbls');
    }
};
