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
        Schema::create('system_user_group', function (Blueprint $table) {
            $table->bigIncrements('user_group_id');
            $table->unsignedBigInteger('company_id')->nullable();
            $table->integer('user_group_level')->nullable();
            $table->string('user_group_name', 50)->nullable();
            $table->string('user_group_token', 250)->default('');
            $table->smallInteger('data_state')->default(0)->nullable();
            $table->unsignedBigInteger('branch_id')->default(1)->nullable();
            $table->unsignedBigInteger('created_id')->nullable();
            $table->unsignedBigInteger('updated_id')->nullable();
            $table->uuid('uuid')->nullable();
            $table->unsignedBigInteger('deleted_id')->nullable();
            $table->softDeletes(); // Menambahkan kolom deleted_at
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('system_user_groups');
    }
};