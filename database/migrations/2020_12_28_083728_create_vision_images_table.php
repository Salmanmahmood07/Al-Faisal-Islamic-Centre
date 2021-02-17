<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisionImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vision_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('vision_id');
            $table->foreign('vision_id')->references('id')->on('visions');
            $table->string('image');
            $table->string('alttext');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vision_images');
    }
}
