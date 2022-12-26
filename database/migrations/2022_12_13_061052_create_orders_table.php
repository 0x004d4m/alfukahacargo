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
        // Schema::create('orders', function (Blueprint $table) {
        //     $table->id();
        //     $table->timestamps();
        // });

        //     General information
        //     branch
        //     order date
        //     received date
        //     status
        //     shipping line
        //     booking number
        //     container number
        //     Tracking url
        //     Final port
        //     Final country
        //     Final city
        //     Consigned To
        //     Sale origin
        //     Seller
        //     Auction
        //     Location
        //     Buyer code
        //     Lot no

        //     Vehicle information
        //     VIN Number
        //     Year
        //     Make
        //     Model
        //     Type
        //     Order parts
        //     Order parts note
        //     Vehicle for cutting
        //     department
        //     Note

        //     Inspection
        //     Color
        //     Damage
        //     New/Used
        //     Keys
        //     Running
        //     Wheels
        //     AirBag
        //     Radio

        //     Services
        //     Date
        //     Billed by
        //     Customer
        //     Service
        //     Quantity
        //     Amount
        //     Invoice (PDF)

        //     Documents
        //     Title
        //     Title Location
        //     State
        //     Title Type
        //     Title No
        //     Title received date
        //     Bill Of Sale
        //     Attachment list (Type Name Document)
        //     Exporter
        //     Consignee => company_id

        //     Notes
        //     Date
        //     Note

        //     Order Parts
        //     note
        //     Ship parts with vehicle
        //     Order parts to branch

        //     Loading details
        //     container info

        //     Add on services

        //     Insurance
        //     Vehicle value
        //     Total Loss (Stranding Cover + Theft)
        //     Full Cover

        //     Images
        //     Type (Received images, Pick Up Images, Auction images, Add On Service Image)
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
