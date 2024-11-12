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
        Schema::create('delbirth_tbls', function (Blueprint $table) {
            $table->id('db_id');
            $table->unsignedBigInteger('mat_id')->nullable(); 
            $table->foreign('mat_id')->references('mat_id')->on('maternal_tbls')->onDelete('cascade');
            $table->datetime('db_delDateTime')->nullable();
            $table->string('db_placeDel', 80)->nullable();
            $table->enum('db_outcome', ['NSVD', 'CS'])->nullable();
            $table->string('db_childFullName', 100)->nullable();
            $table->enum('db_sex', ['Male', 'Female'])->nullable();
            $table->double('db_birthLt')->nullable();
            $table->double('db_birthWt')->nullable();
            $table->enum('db_attendant', ['Doctor', 'Nurse', 'Midwife'])->nullable();
            $table->string('db_fatherFullName', 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delbirth_tbls');
    }
};
