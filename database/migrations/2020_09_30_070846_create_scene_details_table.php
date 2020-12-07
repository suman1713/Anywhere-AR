<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSceneDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scene_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('scene_name')->nullable();
            $table->integer('marker_id')->nullable();
            $table->integer('file')->nullable();
            $table->string('scene_path')->nullable();
            $table->boolean('scene_status')->nullable();
            $table->string('user_id')->nullable();
            $table->string('qrcode')->nullable();

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scene_details');
    }
}
