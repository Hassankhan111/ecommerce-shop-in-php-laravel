<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id('product_id');
            $table->string('product_code')->nullable();

            // Foreign keys
          $table->unsignedBigInteger('product_cat')->nullable();

            $table->unsignedBigInteger ('product_sub_cat')->nullable();
            $table->unsignedBigInteger('product_brand')->nullable();

            // Add foreign key constraints
            $table->foreign('product_cat')
                ->references('cat_id')->on('categories')
                ->onDelete('set null');  // if category deleted, set null

            $table->foreign('product_sub_cat')
                ->references('sub_cat_id')->on('sub_categories')
                ->onDelete('set null');

            $table->foreign('product_brand')
                ->references('brand_id')->on('brands')
                ->onDelete('set null');

            $table->string('product_title')->nullable();
            $table->string('product_desc')->nullable();

            $table->string('product_price')->nullable();
            $table->string('product_img')->nullable();

             $table->string('recent_product')->nullable();
               $table->string('future_product')->nullable();
                 $table->string('populer_product')->nullable();

            $table->string('product_qty')->nullable();
            $table->string('brand_keyword')->nullable();

            $table->integer('product_view')->nullable();
            $table->integer('brand_status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
