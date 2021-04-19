<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessApplicationFileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_application_file', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('application_id')->nullable();
            $table->string('requirement_id')->nullable();
            $table->string('type')->nullable();
            $table->string('status')->default("pending")->nullable();
            $table->text('path')->nullable();
            $table->text('directory')->nullable();
            $table->string('filename')->nullable();
            $table->string('original_name')->nullable();
            $table->string('source')->default("file")->nullable();
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
        Schema::dropIfExists('business_application_file');
    }
}
