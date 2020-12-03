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
            $table->rememberToken();
            $table->string('mood', 255)->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->string('username')->nullable()->unique();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('patronymic')->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->text('about')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('type')->default(1);
            $table->tinyInteger('mode')->default(1);
            $table->date('birthday_at')->nullable();
            $table->timestamp('email_verified_at')->nullable();
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
