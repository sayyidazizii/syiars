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
            $table->id(); // Primary key, auto increment
            $table->char('city_code', 4); // Char, length 4
            $table->foreignId('province_id')->constrained(
                table: 'core_province',
                indexName: 'city_province_id'
            );
            $table->string('city_name', 255); // Varchar, length 255
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
        Schema::dropIfExists('core_city');
    }
};
