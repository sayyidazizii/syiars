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
            $table->id(); // Primary Key dengan auto increment
            $table->char('kelurahan_code', 10);
            $table->foreignId('kecamatan_id')->constrained(
                table: 'core_kecamatan',
                indexName: 'kelurahan_kecamatan_id'
            );
            $table->string('kelurahan_name', 255);
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
