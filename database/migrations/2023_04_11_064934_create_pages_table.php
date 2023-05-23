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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->uuid("uuid");
            $table->foreignId("user_id")->constrained()->cascadeOnDelete();
            $table->string("icon");
            $table->string("thumbnail");
            $table->string("description")->nullable();
            $table->string("name");
            $table->string("location")->nullable();
            $table->string("type");
            $table->unsignedBigInteger("members")->default(0);
            $table->boolean("is_private")->default(0);
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
        Schema::dropIfExists('pages');
    }
};
