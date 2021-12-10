<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('goods_id');
            $table->foreign('goods_id')
                  ->references('id')
                  ->on('goods')
                  ->cascadeOnDelete();
            $table->string('code')->unique();
            $table->integer('amount');
            $table->float('total_price');
            $table->string('stock_type');
            $table->string('input');
            $table->string('responsible');
            $table->string('office')->nullable();
            $table->string('delivery_route')->nullable();
            $table->string('seller')->nullable();
            $table->string('customer')->nullable();
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
        Schema::dropIfExists('stocks');
    }
}
