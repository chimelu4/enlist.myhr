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
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();            
            $table->string('phone')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->string('gender');
            $table->string('address');
            $table->string('comment',255);
            $table->integer('salary');
            $table->integer('job_role')
            ->Reference('id')->on('job_role')
            ->onDelete('restrict');
             $table->integer('status')->default('1');
             $table->string('passport');
             $table->string('idphoto');
             $table->string('id_type') ->Reference('id')->on('identifications')
             ->onDelete('restrict');
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
