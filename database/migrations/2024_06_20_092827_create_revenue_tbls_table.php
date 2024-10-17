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
        Schema::create('revenue_tbls', function (Blueprint $table) {
            $table->id('rev_id');
            $table->text('rev_type')->nullable();
            $table->float('rev_amount')->nullable();
            $table->date('rev_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('revenue_tbls');
    }
};
