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
        Schema::create('options', function (Blueprint $table) {
            $table->id('s_id');
            
            $table->string('site_name')->nullable();
            $table->string('site_title')->nullable();
            $table->string('site_logo')->nullable()->unique();
            $table->string('site_desc')->nullable();
            $table->string('footer_text')->nullable();
            $table->string('currency_format')->nullable();
            
            $table->string('contect_phone')->nullable();
            $table->string('contect_email')->nullable();
            
            $table->string('contect_address')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('options');
    }
};
