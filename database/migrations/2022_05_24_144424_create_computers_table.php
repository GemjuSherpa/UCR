<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('computers', function (Blueprint $table) {
            $table->id('computer_id');
            $table->string('name');
            $table->string('brand');
            $table->string('description');
            $table->integer('price_rate');
            $table->string('file_path');
            $table->string('display_size');
            $table->string('os');
            $table->string('ram');
            $table->integer('usb_port');
            $table->integer('hdmi_port');
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
        Schema::dropIfExists('computers');
    }
};