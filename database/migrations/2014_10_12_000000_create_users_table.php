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
            $table->increments ('id');
            $table->string('bid')->unique();
            $table->string('fullname');
            $table->string('username')->unique();
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();            
            $table->string('phone')->unique()->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('gender');
            $table->string('address')->nullable();
            $table->string('dob')->nullable();
            $table->string('comapny')->nullable();
            $table->string('comapny_addr')->nullable();
            $table->string('comapny_phone')->nullable();
            $table->string('company_position')->nullable();
            $table->integer('account_type');            
             $table->integer('status')->default('1');
             $table->string('passport')->nullable();
             $table->string('app_token')->nullable();
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
}
