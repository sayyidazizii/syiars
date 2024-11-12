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
            $table->id('city_id')->index('city_id');
            $table->char('city_code', 4)->default('')->nullable();
            $table->unsignedBigInteger('province_id')->default(0)->index('FK_core_city_province_id');
            $table->foreign('province_id')
            ->references('province_id')
            ->on('core_province')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->char('province_code', 2)->default('')->nullable()->index('regencies_province_id_index');
            $table->string('city_name', 255)->default('')->nullable();
            $table->string('province_no', 20)->default('')->nullable();
            $table->string('city_no', 20)->default('')->nullable();
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
        Schema::dropIfExists('core_city');
    }
};
