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
            $table->string('blog_recommend1')->after('blog_insLink')->nullable();
            $table->string('blog_recommendTitle1', 100)->after('blog_recommend1')->nullable();  
            $table->string('blog_recommendPic1')->after('blog_recommendTitle1')->nullable();

            $table->string('blog_recommend2')->after('blog_recommendPic1')->nullable();
            $table->string('blog_recommendTitle2', 100)->after('blog_recommend2')->nullable();  
            $table->string('blog_recommendPic2')->after('blog_recommendTitle2')->nullable(); 
            
            $table->string('blog_recommend3')->after('blog_recommendPic2')->nullable();
            $table->string('blog_recommendTitle3', 100)->after('blog_recommend3')->nullable();  
            $table->string('blog_recommendPic3')->after('blog_recommendTitle3')->nullable();  

            $table->string('blog_recommend4')->after('blog_recommendPic3')->nullable();
            $table->string('blog_recommendTitle4', 100)->after('blog_recommend4')->nullable();  
            $table->string('blog_recommendPic4')->after('blog_recommendTitle4')->nullable();  
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('blogs_tbls', function (Blueprint $table) {
            
        });
    }
};
