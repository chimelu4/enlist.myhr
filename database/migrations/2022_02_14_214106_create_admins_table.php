<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
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
            $table->string('address')->nullable();
            $table->integer('salary')->nullable();
            $table->integer('job_role')
            ->Reference('id')->on('job_role')
            ->onDelete('restrict');
             $table->integer('status')->default('1');
             $table->string('passport');
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
        Schema::dropIfExists('admins');
    }
}
