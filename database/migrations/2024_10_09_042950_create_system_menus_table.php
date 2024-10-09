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
        Schema::create('system_menus', function (Blueprint $table) {
            $table->string('id_menu', 10)->primary();
            $table->string('id', 100)->nullable();
            $table->enum('type', array('folder', 'file', 'function'))->nullable();
            $table->integer('indent_level', 1)->nullable();
            $table->string('text', 50)->nullable();
            $table->string('image', 50)->nullable();
            $table->integer('company_id', 10)->nullable();
            $table->unsignedBigInteger('branch_id')->default(1)->nullable();
            $table->unsignedBigInteger('created_id')->nullable();
            $table->unsignedBigInteger('updated_id')->nullable();
            $table->uuid('uuid')->nullable();
            $table->unsignedBigInteger('deleted_id')->nullable();
            $table->softDeletes(); // Menambahkan kolom deleted_at
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('system_menus');
    }
};