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
        Schema::create('recentproduct', function (Blueprint $table) {
               $table->id('rpro_id');
            $table->string('rpro_code')->nullable();


            $table->string('rpro_title')->nullable();
            $table->string('rpro_desc')->nullable();

            $table->string('rpro_price')->nullable();
            $table->string('rpro_img')->nullable();

            $table->string('rpro_qty')->nullable();
            $table->string('rpro_keyword')->nullable();

            $table->integer('rpro_view')->nullable();
            $table->integer('rpro_status')->nullable();
             $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recentproduct');
    }
};
