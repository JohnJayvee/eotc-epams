<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessApplicationSOW extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_application_sow', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('application_id')->nullable();
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->string('description')->nullable();
            $table->string('type')->nullable();
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
        Schema::dropIfExists('business_application_sow');
    }
}
