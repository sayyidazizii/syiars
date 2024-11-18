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
        Schema::create('core_office', function (Blueprint $table) {
            $table->increments('office_id');
            $table->unsignedBigInteger('branch_id')->default(0)->index('FK_core_city_branch_id');
            $table->foreign('branch_id')
            ->references('branch_id')
            ->on('core_branch')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->unsignedBigInteger('user_id')->default(0);
            $table->string('office_code', 20)->nullable();
            $table->string('office_name', 50)->nullable();
            $table->smallInteger('data_state')->default(0)->nullable();
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
        Schema::dropIfExists('core_office');
    }
};
