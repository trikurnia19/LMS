<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobAppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_appliers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->date('birthday')->nullable();
            $table->string('university_name')->nullable();
            $table->string('major')->nullable();
            $table->year('graduating_year')->nullable();
            $table->string('cv_path');
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
        Schema::dropIfExists('job_appliers');
    }
}
