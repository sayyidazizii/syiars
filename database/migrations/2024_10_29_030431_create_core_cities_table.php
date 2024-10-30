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
        Schema::create('core_city', function (Blueprint $table) {
            $table->increments('city_id'); // Primary key, auto increment
            $table->char('city_code', 4); // Char, length 4
            $table->integer('province_id')->default(0); // Integer, default 0
            $table->char('province_code', 2); // Char, length 2
            $table->string('city_name', 255); // Varchar, length 255
            $table->string('province_no', 20)->default(''); // Varchar, length 20, default ''
            $table->string('city_no', 20)->default(''); // Varchar, length 20, default ''
            $table->smallInteger('data_state')->default(0)->nullable();
            $table->unsignedBigInteger('branch_id')->default(1)->nullable();
            $table->unsignedBigInteger('created_id')->nullable();
            $table->dateTime('created_on')->nullable(); 
            $table->unsignedBigInteger('updated_id')->nullable();
            $table->uuid('uuid')->nullable();
            $table->unsignedBigInteger('deleted_id')->nullable();
            $table->softDeletes(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('core_cities');
    }
};
