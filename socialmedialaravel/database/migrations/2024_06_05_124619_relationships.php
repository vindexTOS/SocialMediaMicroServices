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
        
        
        
        Schema::table("userinfos", function (Blueprint $table) {
            
            $table->unsignedBigInteger("profile_photo_id");
            $table->unsignedBigInteger("wall_papper_id");
            $table->unsignedBigInteger("user_id");
            
            
            $table->foreign("profile_photo_id")->references("id")->on("photos")->onDelete('cascade');
            $table->foreign("wall_papper_id")->references("id")->on("photos")->onDelete("cascade");
            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");
        });
        
        Schema::table("photos" ,function (Blueprint $table){
            $table->unsignedBigInteger("user_id");
            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");
            
        });
        
        Schema::table("posts", function(Blueprint $table){
            
            $table->unsignedBigInteger("img_id")  ;
            $table->unsignedBigInteger("user_id")  ;
            
            
            $table->foreign("user_id")->references("id")->on("users");
            $table->foreign("img_id")->references("id")->on("photos");
        });
        
        
        Schema::table("likes", function(Blueprint $table){
            $table->unsignedBigInteger("post_id");
            $table->unsignedBigInteger("user_id");
            
            
            
            $table->foreign("user_id")->references("id")->on("users");
            $table->foreign("post_id")->references("id")->on("posts");
        });
        
        
        Schema::table("friends", function(Blueprint $table){
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("friend_id");
            
            $table->foreign("user_id")->references("id")->on("users");
            $table->foreign("friend_id")->references("id")->on("users");
            
        });
        
        
        Schema::table("comments", function(Blueprint $table){
            $table->unsignedBigInteger("img_id");
            $table->unsignedBigInteger("post_id");
            $table->unsignedBigInteger("user_id");
            
            $table->foreign("user_id")->references("id")->on("users");
            $table->foreign("img_id")->references( "id")->on("photos");
            $table->foreign("post_id")->references("id")->on("posts");
            
        });
    }
    
    /**
    * Reverse the migrations.
    */
    public function down(): void
    {
        Schema::table('likes', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['post_id']);
            $table->dropColumn(['user_id', 'post_id']);
        });
        
    }
};
