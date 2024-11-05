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
            $table->id('kecamatan_id');
            $table->string('city_code')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->string('kecamatan_code')->nullable();
            $table->string('kecamatan_name')->nullable();
            $table->integer('city_no')->default(0);
            $table->integer('kecamatan_no')->default(0);
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
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('core_kecamatan');
    }
}
