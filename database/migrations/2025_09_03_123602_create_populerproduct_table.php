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
        Schema::create('populerproduct', function (Blueprint $table) {
             $table->id('pro_id');
            $table->string('pro_code')->nullable();


            $table->string('pro_title')->nullable();
            $table->text('pro_desc')->nullable();

            $table->string('pro_price')->nullable();
            $table->string('pro_img')->nullable();

            $table->string('pro_qty')->nullable();
            $table->string('pro_keyword')->nullable();

            $table->integer('pro_view')->nullable();
            $table->boolean('pro_status')->nullable();
             $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('populerproduct');
    }
};
