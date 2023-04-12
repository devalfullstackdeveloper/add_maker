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
            $table->string('namePrefix')->nullable();
            $table->string('firstname')->nullable();;
            $table->string('lastname')->nullable();;
            $table->string('middlename')->nullable();;
            $table->string('nickname')->nullable();
            $table->string('nameSuffix')->nullable();
            $table->string('email')->nullable();;
            $table->timestamp('email_verified_at')->nullable();
            $table->string('is_admin')->nullable();
            $table->string('password');
            $table->string('mobileno')->nullable();;
            $table->string('otp')->nullable();;
            $table->rememberToken();
            $table->timestamps();
            $table->string('google_id')->nullable();
            $table->string('facebook_id')->nullable();
            $table->string('instagram_id')->nullable();
            $table->string('apple_id')->nullable();
            $table->string('login_id')->nullable();
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
