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
        Schema::table('payments', function (Blueprint $table) {
            $table->dropForeign('payments_order_id_foreign');
            $table->dropColumn('order_id');
            $table->dropForeign('payments_payer_id_foreign');
            $table->dropColumn('payer_id');
            $table->dropForeign('payments_receiver_id_foreign');
            $table->dropColumn('receiver_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
