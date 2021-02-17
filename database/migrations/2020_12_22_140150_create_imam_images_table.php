<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImamImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imam_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('imam_id');
            $table->foreign('imam_id')->references('id')->on('imams');
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
        Schema::dropIfExists('imam_images');
    }
}
