<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_employee', function (Blueprint $table) {
            $table->id();
            $table->string('emp_first_name');
            $table->string('emp_middel_name');
            $table->string('emp_thired_name');
            $table->string('emp_last_name');
            $table->date('emp_hirdate');
            $table->decimal('emp_salary');
            $table->integer('emp_ssn');
            $table->integer('emp_telphone');
            $table->integer('emp_mobile');
            $table->string('emp_email');
            $table->string('emp_photo');
            $table->boolean('is_active');
            $table->boolean('delete');
            $table->string('attchment');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee');
    }
}
