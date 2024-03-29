<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('socials', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained()->cascadeOnDelete();
            $table->string("Facebook")->nullable();
            $table->string("Twitter")->nullable();
            $table->string("Linkedin")->nullable();
            $table->string("Instagram")->nullable();
            $table->string("Flickr")->nullable();
            $table->string("Github")->nullable();
            $table->string("Skype")->nullable();
            $table->string("Google")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('socials');
    }
};
