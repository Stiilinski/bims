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
        Schema::create('brgy_officials_tbls', function (Blueprint $table) {
            $table->id('of_id');
            $table->unsignedBigInteger('res_id'); // Match the data type of res_id
            $table->foreign('res_id')->references('res_id')->on('resident_tbls')->onDelete('cascade'); // Adjusted foreign key definition
            $table->string('of_position', 30)->nullable();
            $table->date('of_date')->nullable();
            $table->string('of_status', 15)->nullable();
            $table->text('of_picture');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brgy_officials_tbls');
    }
};
