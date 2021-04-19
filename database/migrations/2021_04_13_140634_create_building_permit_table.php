<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuildingPermitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('building_permit', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('application_id')->nullable();
            $table->string('occupancy_classified')->nullable();
            $table->string('unit_no')->nullable();
            $table->date('proposed_date')->nullable();
            $table->date('expected_date')->nullable();
            $table->string('related_permits')->nullable();
            $table->string('floor_area')->nullable();
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
        Schema::dropIfExists('building_permit');
    }
}
