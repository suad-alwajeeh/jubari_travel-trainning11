<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rolees', function (Blueprint $table) {
            $table->id();
            $table->string('role_name');
            $table->integer('how_add_it')->default();
            $table->integer('is_delete')->default(0);
            $table->integer('is_active')->default(1);
            $table->text('role_descripe');
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
        Schema::dropIfExists('roles');
    }
}
