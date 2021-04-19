<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElectricalPermitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('electrical_permit', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('application_id')->nullable();
            $table->string('connected_load')->nullable();
            $table->string('transformer_capacity')->nullable();
            $table->string('ups_capacity')->nullable();
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
        Schema::dropIfExists('electrical_permit');
    }
}
