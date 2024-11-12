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
        Schema::create('core_dusun', function (Blueprint $table) {
            $table->id('dusun_id');
            $table->foreignId('kelurahan_id')->constrained(
                table: 'core_kelurahan',
                indexName: 'dusun_kelurahan_id'
            );
            $table->string('dusun_code', 10)->nullable();
            $table->string('dusun_name', 50)->nullable();
            $table->smallInteger('data_state')->default(0)->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('core_dusun');
    }
};
