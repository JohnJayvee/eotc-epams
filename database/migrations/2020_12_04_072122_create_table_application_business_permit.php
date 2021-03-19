<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableApplicationBusinessPermit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_business_permit', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('owner_user_id')->nullable();
            $table->string('business_id')->nullable();
            $table->string('service_id')->nullable();
            $table->string('permit_id')->nullable();
            $table->string('locator_enterprise')->nullable();
            $table->string('project_title')->nullable();
            $table->string('locator_zone')->nullable();
            $table->string('contractor')->nullable();
            $table->string('is_agreement_check')->default(0)->nullable();

            $table->string('status')->default("PENDING")->nullable();
            $table->string('remarks')->nullable();
            $table->string('processor_id')->nullable();
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
        Schema::dropIfExists('application_business_permit');
    }
}
