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
        Schema::create('containers', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar');
            $table->string('name_en');
            $table->string('reference_number');
            $table->string('container_number');
            $table->unsignedBigInteger('loading_status_id');
            $table->foreign('loading_status_id')->references('id')->on('loading_statuses');
            $table->unsignedBigInteger('loading_port_id');
            $table->foreign('loading_port_id')->references('id')->on('ports');
            $table->unsignedBigInteger('delivery_port_id');
            $table->foreign('delivery_port_id')->references('id')->on('ports');
            $table->string('shipping_line');
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
        Schema::dropIfExists('containers');
    }
};
