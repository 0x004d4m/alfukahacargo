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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('company_id')->nullable();
            $table->foreign('company_id')->references('id')->on('companies');

            $table->unsignedBigInteger('order_type_id');
            $table->foreign('order_type_id')->references('id')->on('order_types');

            $table->unsignedBigInteger('order_status_id');
            $table->foreign('order_status_id')->references('id')->on('order_statuses');

            $table->unsignedBigInteger('branch_id')->nullable();
            $table->foreign('branch_id')->references('id')->on('branches');

            $table->unsignedBigInteger('department_id')->nullable();
            $table->foreign('department_id')->references('id')->on('departments');

            $table->unsignedBigInteger('location_id')->nullable();
            $table->foreign('location_id')->references('id')->on('locations');

            $table->unsignedBigInteger('start_port_id')->nullable();
            $table->foreign('start_port_id')->references('id')->on('ports');

            $table->unsignedBigInteger('start_country_id')->nullable();
            $table->foreign('start_country_id')->references('id')->on('countries');

            $table->unsignedBigInteger('start_state_id')->nullable();
            $table->foreign('start_state_id')->references('id')->on('states');

            $table->unsignedBigInteger('start_city_id')->nullable();
            $table->foreign('start_city_id')->references('id')->on('cities');

            $table->unsignedBigInteger('final_port_id')->nullable();
            $table->foreign('final_port_id')->references('id')->on('ports');

            $table->unsignedBigInteger('final_country_id')->nullable();
            $table->foreign('final_country_id')->references('id')->on('countries');

            $table->unsignedBigInteger('final_state_id')->nullable();
            $table->foreign('final_state_id')->references('id')->on('states');

            $table->unsignedBigInteger('final_city_id')->nullable();
            $table->foreign('final_city_id')->references('id')->on('cities');

            $table->unsignedBigInteger('consigned_to_id')->nullable();
            $table->foreign('consigned_to_id')->references('id')->on('companies');

            $table->unsignedBigInteger('seller_id')->nullable();
            $table->foreign('seller_id')->references('id')->on('companies');
            $table->unsignedBigInteger('auction_id')->nullable();
            $table->foreign('auction_id')->references('id')->on('auctions');

            $table->string('vin_number')->nullable();
            $table->string('year')->nullable();
            $table->string('make')->nullable();
            $table->string('model')->nullable();
            $table->string('type')->nullable();
            $table->string('sale_origin')->nullable();
            $table->boolean('order_parts')->nullable();
            $table->text('order_parts_note')->nullable();
            $table->boolean('vehicle_for_cutting')->nullable();
            $table->text('vehicle_for_cutting_note')->nullable();
            $table->text('note_to_department')->nullable();
            $table->string('order_date')->nullable();
            $table->string('received_date')->nullable();
            $table->string('shipping_line')->nullable();
            $table->string('container_number')->nullable();
            $table->string('booking_number')->nullable();
            $table->json('images')->nullable();
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
        Schema::dropIfExists('orders');
    }
};
