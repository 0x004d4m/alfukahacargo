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
        Schema::create('generals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('branch_id')->nullable();
            $table->foreign('branch_id')->references('id')->on('branches');
            $table->string('order_date')->nullable();
            $table->string('received_date')->nullable();
            $table->string('shipping_line')->nullable();
            $table->unsignedBigInteger('container_id')->nullable();
            $table->foreign('container_id')->references('id')->on('containers');
            $table->unsignedBigInteger('final_port_id')->nullable();
            $table->foreign('final_port_id')->references('id')->on('ports');
            $table->unsignedBigInteger('final_country_id')->nullable();
            $table->foreign('final_country_id')->references('id')->on('countries');
            $table->unsignedBigInteger('final_state_id')->nullable();
            $table->foreign('final_state_id')->references('id')->on('states');
            $table->unsignedBigInteger('final_city_id')->nullable();
            $table->foreign('final_city_id')->references('id')->on('cities');
            $table->unsignedBigInteger('company_id')->nullable();
            $table->foreign('company_id')->references('id')->on('companies');
            $table->unsignedBigInteger('consigned_to_id')->nullable();
            $table->foreign('consigned_to_id')->references('id')->on('companies');
            $table->string('sale_origin')->nullable();
            $table->unsignedBigInteger('seller_id')->nullable();
            $table->foreign('seller_id')->references('id')->on('companies');
            $table->unsignedBigInteger('auction_id')->nullable();
            $table->foreign('auction_id')->references('id')->on('auctions');
            $table->unsignedBigInteger('port_id')->nullable();
            $table->foreign('port_id')->references('id')->on('ports');
            $table->unsignedBigInteger('country_id')->nullable();
            $table->foreign('country_id')->references('id')->on('countries');
            $table->unsignedBigInteger('state_id')->nullable();
            $table->foreign('state_id')->references('id')->on('states');
            $table->unsignedBigInteger('city_id')->nullable();
            $table->foreign('city_id')->references('id')->on('cities');

            $table->unsignedBigInteger('order_id')->nullable();
            $table->foreign('order_id')->references('id')->on('orders');

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
        Schema::dropIfExists('generals');
    }
};
