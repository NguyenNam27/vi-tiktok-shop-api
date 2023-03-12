<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
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
            $table->string('email')->nullable()->index();
            $table->string('phone')->nullable()->index();
            $table->string('first_name', 50)->nullable();
            $table->string('last_name', 50)->nullable()->index();
            $table->string('user_type', 50)->nullable()->index();
            $table->string('gender', 10)->nullable()->index();
            $table->date('date_of_birth')->nullable()->index();
            $table->unsignedTinyInteger('status')->default(1);
            $table->unsignedTinyInteger('is_user_banned')->default(0);
            $table->unsignedTinyInteger('newsletter_enable')->default(0);
            $table->unsignedInteger('otp')->nullable();
            $table->string('firebase_auth_id')->nullable();
            $table->unsignedTinyInteger('is_password_set')->default(1);
            $table->json('images')->nullable();
            $table->json('socials')->nullable();
            $table->timestamp('last_login')->nullable();
            $table->double('balance')->nullable();

            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
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
}
