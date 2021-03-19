<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->string('type')->nullable();

            $table->string('company_name')->nullable();
            $table->string('company_address')->nullable();
            $table->string('company_first_name')->nullable();
            $table->string('company_last_name')->nullable();
            $table->string('company_middle_name')->nullable();
            $table->string('company_email')->nullable();
            $table->string('tel_number')->nullable();
            $table->string('company_contact_number')->nullable();

            $table->string('pcab_undertaking')->nullable();
            $table->string('validity_period')->nullable();
            $table->string('contractor_id')->nullable();
            $table->string('other_classification')->nullable();
            $table->string('classification')->nullable();
            $table->string('contractor_name')->nullable();
            $table->string('contractor_contact_number')->nullable();

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
        Schema::dropIfExists('customer');
    }
}
