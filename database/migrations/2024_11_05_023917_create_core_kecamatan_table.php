<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoreKecamatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('core_kecamatan', function (Blueprint $table) {
            $table->id('kecamatan_id')->index('kecamatan_id');
            $table->char('city_code', 4)->default('')->nullable()->index('districts_regency_id_index');
            $table->unsignedBigInteger('city_id')->default(0)->index('FK_core_kecamatan_city_id');
            $table->foreign('city_id')
                  ->references('city_id')
                  ->on('core_city')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->char('kecamatan_code', 7)->default('')->nullable()->index();
            $table->string('kecamatan_name', 255)->default('')->nullable()->index();
            $table->string('city_no', 20)->default('')->index();
            $table->string('kecamatan_no', 20)->default('')->index();
            $table->smallInteger('data_state')->default(0)->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('core_kecamatan');
    }
}
