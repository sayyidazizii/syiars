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
        Schema::create('core_kecamatan', function (Blueprint $table) {
            $table->increments('kecamatan_id');
            $table->char('city_code', 4);
            $table->unsignedBigInteger('city_id')->default(0)->nullable();
            $table->char('kecamatan_code', 4);
            $table->string('kecamatan_name', 255);
            $table->string('city_no', 20)->nullable();
            $table->string('kecamatan_no', 20)->nullable();
            $table->smallInteger('data_state')->default(0)->nullable();
            $table->unsignedBigInteger('branch_id')->default(1)->nullable();
            $table->unsignedBigInteger('created_id')->nullable();
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
        Schema::dropIfExists('core_kecamatan');
    }
};
