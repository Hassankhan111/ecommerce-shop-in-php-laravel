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
      Schema::create('sub-categories', function (Blueprint $table) {
            $table->id('sub_cat_id');
            $table->string('sub_cat_title')->nullable();

            $table->string('show_in_header')->nullable();
            
            $table->string('show_in_footer')->nullable();
            // Foreign keys
            $table->unsignedBigInteger('cat_parent')->nullable();
           $table->unsignedBigInteger('cat_product')->nullable();

            // Add foreign key constraints
            $table->foreign('cat_parent')
                ->references('cat_id')->on('categories')
                ->onDelete('set null');  // if category deleted, set null

           $table->foreign('cat_product')
                ->references('product_id')->on('produts')
                ->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
