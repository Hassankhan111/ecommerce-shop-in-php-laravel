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
        Schema::create('futureproduct', function (Blueprint $table) {
              $table->id('fpro_id');
            $table->string('fpro_code')->nullable();


            $table->string('fpro_title')->nullable();
            $table->string('fpro_desc')->nullable();

            $table->string('fpro_price')->nullable();
            $table->string('fpro_img')->nullable();

            $table->string('fpro_qty')->nullable();
            $table->string('fpro_keyword')->nullable();

            $table->integer('fpro_view')->nullable();
            $table->integer('fpro_status')->nullable();
             $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('futureproduct');
    }
};
