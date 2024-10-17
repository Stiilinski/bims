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
        Schema::create('blogs_tbls', function (Blueprint $table) {
            $table->id('blog_id');
            $table->string('blog_title', 50)->nullable();
            $table->string('blog_description')->nullable();
            $table->datetime('blog_date')->nullable();
            $table->string('blog_author', 50)->nullable();
            $table->foreign('blog_author')->references('em_id')->on('employee_tbls')->onDelete('cascade');
            $table->enum('blog_category', ['Events', 'Projects', 'Community Story'])->nullable();
            $table->string('blog_status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs_tbls');
    }
};
