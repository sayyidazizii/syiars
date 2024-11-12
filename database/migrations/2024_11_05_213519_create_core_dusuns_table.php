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
            $table->unsignedBigInteger('kelurahan_id')->default(0);
            $table->string('dusun_code', 10)->default('');
            $table->string('dusun_name', 50)->default('')->index();
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
