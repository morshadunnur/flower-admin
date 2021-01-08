<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
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
            $table->foreignId('customer_id');
            $table->tinyInteger('global_order_status')->default(1)->comment('
                1 = placed
                2 = processing
                3 = Ready to delivery
                4 = Delivered to courier
                5 = Deliver completed
            ');
            $table->enum('type', ['cart','wishlist','order','later','offer']);
            $table->text('address')->nullable();
            $table->text('shipping_address')->nullable();
            $table->string('remarks')->nullable();
            $table->dateTime('placed_date')->nullable();
            $table->boolean('mail_sent')->default(false);
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
        Schema::dropIfExists('orders');
    }
}
