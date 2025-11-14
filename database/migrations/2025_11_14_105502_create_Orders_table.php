<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('Orders', function (Blueprint $table) {
             $table->string('order_id');
            $table->unsignedBigInteger('products')->nullable();
            $table->unsignedBigInteger('product_user')->nullable();
            $table->string('product_qty')->nullable();
            $table->string('total_amount')->nullable();
            $table->timestamp('order_date')->nullable();

            $table->integer('pay_req_id')->nullable();
            $table->tinyInteger('confirm')->nullable()->default(0);
            $table->tinyInteger('delivery')->nullable()->default(0);

            $table->foreign('products')->references('product_id')->on('products')->onDelete('cascade');
            $table->foreign('product_user')->references('userId')->on('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_orders');
    }
};
