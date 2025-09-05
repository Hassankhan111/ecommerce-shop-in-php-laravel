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
        Schema::create('admins', function (Blueprint $table) {
            $table->id('adminId');
            $table->string('fullname')->nullable();
            $table->string('username')->nullable();
            $table->string('phone')->nullable()->unique();
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->string('address')->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_log')->nullable()->default('0');
            $table->string('cur_formet')->nullable();
            $table->string('admin_role')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
