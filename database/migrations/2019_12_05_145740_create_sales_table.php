<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_product');
            $table->unsignedBigInteger('id_customer');
            $table->integer('quantity');
            $table->double('discount')->nullable();
            $table->double('sales_amount')->nullable();
            $table->unsignedBigInteger('id_status');
            $table->timestamps();

            $table->foreign('id_product')
                  ->references('id')
                  ->on('products')
                  ->onDelete('cascade');
            $table->foreign('id_customer')
                  ->references('id')
                  ->on('customers')
                  ->onDelete('cascade');
            $table->foreign('id_status')
                  ->references('id')
                  ->on('status_sales')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
