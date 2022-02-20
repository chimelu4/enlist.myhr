<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobpostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobposts', function (Blueprint $table) {
            $table->increments ('id');
            $table->integer('job_type')->reference('id')
            ->on('jobtypes')
            ->onDelete('restrict');
            $table->integer('industry')->reference('id')
            ->on('industries')
            ->onDelete('restrict');
            $table->string('salary_from');
            $table->string('salary_to');
            $table->date('date_open');
            $table->date('date_closing');
            $table->integer('company_id');           
            $table->string('image');
            $table->string('job_description');
            $table->integer('min_qualification')->reference('id')
            ->on('qualifications')
            ->onDelete('restrict'); 
            $table->integer('highest_qualification')->reference('id')
            ->on('qualifications')
            ->onDelete('restrict');
            $table->string('other_requirement');           
             $table->integer('status')->default('0');
             $table->integer('approved_by')->reference('id')
             ->on('admin')
             ->onDelete('restrict');
              $table->integer('posted_by');
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
        Schema::dropIfExists('jobposts');
    }
}
