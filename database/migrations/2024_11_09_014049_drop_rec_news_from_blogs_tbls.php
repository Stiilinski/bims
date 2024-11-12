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
            $table->dropColumn('blog_recommend1');
            $table->dropColumn('blog_recommendTitle1');
            $table->dropColumn('blog_recommendPic1');
            
            $table->dropColumn('blog_recommend2');
            $table->dropColumn('blog_recommendTitle2');
            $table->dropColumn('blog_recommendPic2');

            $table->dropColumn('blog_recommend3');
            $table->dropColumn('blog_recommendTitle3');
            $table->dropColumn('blog_recommendPic3');

            $table->dropColumn('blog_recommend4');
            $table->dropColumn('blog_recommendTitle4');
            $table->dropColumn('blog_recommendPic4');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('blogs_tbls', function (Blueprint $table) {
            $table->string('blog_recommend1');
            $table->string('blog_recommendTitle1');
            $table->string('blog_recommendPic1');
            
            $table->string('blog_recommend2');
            $table->string('blog_recommendTitle2');
            $table->string('blog_recommendPic2');

            $table->string('blog_recommend3');
            $table->string('blog_recommendTitle3');
            $table->string('blog_recommendPic3');

            $table->string('blog_recommend4');
            $table->string('blog_recommendTitle4');
            $table->string('blog_recommendPic4');
        });
    }
};
