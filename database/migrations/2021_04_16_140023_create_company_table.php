<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('entity_code')->nullable();
            $table->string('comp_code')->nullable();
            $table->string('urn')->nullable();
            $table->string('company_name')->nullable();
            $table->string('type')->nullable();
            $table->string('type_code')->nullable();
            $table->string('zone_code')->nullable();
            $table->string('zone_locaion')->nullable();
            $table->string('cr_no')->nullable();
            $table->string('industry')->nullable();
            $table->string('city')->nullable();
            $table->string('province')->nullable();
            $table->string('region')->nullable();
            $table->string('region_code')->nullable();
            $table->string('obo_cluster')->nullable();
            $table->string('income_cluster')->nullable();
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
        Schema::dropIfExists('company');
    }
}
