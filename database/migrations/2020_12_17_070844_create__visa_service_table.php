<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisaServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visa_service', function (Blueprint $table) {
            $table->id('visa_id');
            $table->date('Issue_date');
            $table->string('refernce');
            $table->string('passenger_name');
            $table->integer('visa_status');
            $table->integer('voucher_number');
            $table->string('country');
            $table->string('visa_type');
            $table->text('visa_info');
            $table->string('Dep_city');
            $table->string('arr_city');
            $table->date('dep_date');
            $table->string('bus_name');
            $table->string('due_to_supp');
            $table->decimal('provider_cost');
            $table->integer('cur_id');
            $table->string('due_to_customer');
            $table->decimal('cost');
            $table->integer('service_id');
            $table->string('passnger_currency');
            $table->text('remark');
            $table->integer('deleted');
            $table->integer('service_status');

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
        Schema::dropIfExists('_visa_service');
    }
}
