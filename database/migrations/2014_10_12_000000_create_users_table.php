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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->uuid("uuid");
            $table->string('last_name')->nullable();
            $table->string('first_name')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable()->unique();
            $table->string('mobile')->nullable()->unique();
            $table->string('mobile_verification_code')->nullable();
            $table->timestamp('mobile_verified_at')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->text('description')->nullable();
            $table->string('thumbnial')->nullable();
            $table->string('profile')->nullable();
            $table->enum('gender',['male','female']);
            $table->enum('relationship',['single','married','engage']);
            $table->string('location')->nullable();
            $table->string('address')->nullable();
            $table->boolean('is_private')->default(0);
            $table->boolean('is_banned')->default(0);
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
