<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_service', function (Blueprint $table) {
            $table->id('ser_id');
            $table->string('ser_name');
            $table->string('discrption');
            $table->date('create_at');
            $table->boolean('is_active');
            $table->boolean('deleted');
            $table->integer('emp_id_how_create');
             

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service');
    }
}
