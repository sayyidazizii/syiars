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
            $table->id('kelurahan_id')->index('kelurahan_id');
            $table->char('kelurahan_code', 10)->default('')->nullable();
            $table->unsignedBigInteger('kecamatan_id')->default(0)->index('FK_core_kelurahan_kecamatan_id');
            $table->foreign('kecamatan_id')
                  ->references('kecamatan_id')
                  ->on('core_kecamatan')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->char('kecamatan_code', 7)->default('')->nullable()->index('villages_district_id_index');
            $table->string('kelurahan_name', 255)->default('')->nullable()->index('kelurahan_name');
            $table->string('kecamatan_no', 255)->default('');
            $table->string('kelurahan_no', 20)->default('');
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
        Schema::dropIfExists('core_kelurahan');
        Schema::table('core_kelurahan', function (Blueprint $table) {
            $table->dropForeign(['kecamatan_id']);
        });
    }
};
