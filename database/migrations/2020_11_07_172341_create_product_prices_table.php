<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_prices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id');
            $table->string('sku_uuid')->index();
            $table->decimal('cost_price', 8, 2);
            $table->decimal('selling_price', 8, 2);
            $table->decimal('quantity', 8, 2)->default(0);
            $table->tinyInteger('status')->default(0)->comment('
                0 = inactive
                1 = active
            ');
            $table->timestamps();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_prices');
    }
}
