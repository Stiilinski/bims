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
        Schema::table('blogs_tbls', function (Blueprint $table) {
            $table->dropColumn('blog_recommend');
            $table->dropColumn('blog_recTitle');
            $table->dropColumn('blog_recommendPic');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('blogs_tbls', function (Blueprint $table) {
            $table->json('blog_recommend');
            $table->json('blog_recTitle');
            $table->json('blog_recommendPic');
        });
    }
};
