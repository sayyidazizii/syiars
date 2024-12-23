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
        Schema::create('system_menu', function (Blueprint $table) {
            $table->string('id_menu', 10)->primary();
            $table->string('id', 100)->nullable();
            $table->enum('type', ['folder', 'file', 'function'])->nullable();
            $table->tinyInteger('indent_level', false, true)->nullable();
            $table->string('text', 50)->nullable();
            $table->string('image', 50)->nullable();
            $table->unsignedBigInteger('company_id')->nullable();
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
        Schema::dropIfExists('system_menus');
    }
};
