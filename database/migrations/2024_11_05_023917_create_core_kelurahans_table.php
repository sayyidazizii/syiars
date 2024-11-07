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
        Schema::create('core_kelurahan', function (Blueprint $table) {
            $table->increments('kelurahan_id'); // Primary Key dengan auto increment
            $table->char('kelurahan_code', 10);
            $table->unsignedInteger('kecamatan_id')->default(0)->nullable(); // Foreign key untuk kecamatan
            $table->char('kecamatan_code', 7);
            $table->string('kelurahan_name', 255);
            $table->string('kecamatan_no', 20)->nullable();
            $table->string('kelurahan_no', 20)->nullable();
            $table->smallInteger('data_state')->default(0)->nullable();
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
        Schema::dropIfExists('core_kelurahan');
    }
};
