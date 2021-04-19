<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessApplicationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_application', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('owner_user_id')->nullable();
            $table->string('business_id')->nullable();
            $table->string('service_id')->nullable();
            $table->string('permit_id')->nullable();

            //applicant details
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('tel_no')->nullable();

            //project details
            $table->string('registered_enterprise')->nullable();
            $table->string('registration_number')->nullable();
            $table->string('classification')->nullable();
            $table->string('occupancy')->nullable();
            $table->string('contractor')->nullable();
            $table->string('pcab_license_number')->nullable();
            $table->string('locator_enterprise')->nullable();
            $table->string('project_title')->nullable();
            $table->string('project_cost')->nullable();
            $table->string('locator_zone')->nullable();
            $table->string('address')->nullable();
            $table->string('brgy')->nullable();
            $table->string('brgy_name')->nullable();
            $table->string('town')->nullable();
            $table->string('town_name')->nullable();
            $table->string('region')->nullable();
            $table->string('region_name')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('is_agreement_check')->nullable();

            $table->string('status')->default("PENDING")->nullable();
            $table->string('is_validated')->default("no")->nullable();
            $table->date('validated_at')->nullable();
            $table->string('frontliner_id')->nullable();
            $table->string('remarks')->nullable();
            $table->string('engineer_id')->nullable();
            $table->string('processed_at')->nullable();

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
        Schema::dropIfExists('business_application');
    }
}
