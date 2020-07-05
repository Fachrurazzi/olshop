<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn([
                'product_id', 'product_name', 'product_description',
                'product_price', 'qty', 'subtotal'
            ]);

            $table->integer('total')->after('status');
            $table->string('courier')->after('status');
            $table->integer('shipping_cost')->after('courier');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->bigInteger('product_id')->unsigned();
            $table->string('product_name');
            $table->string('product_description');
            $table->string('product_price');
            $table->integer('qty');
            $table->integer('subtotal');

            $table->dropColumn(['total', 'courier', 'shipping_cost']);
        });
    }
}
