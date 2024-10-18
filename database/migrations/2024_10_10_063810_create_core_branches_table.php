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
        Schema::create('core_branch', function (Blueprint $table) {
            $table->bigIncrements('branch_id');
            $table->string('branch_code',255)->nullable();
            $table->string('branch_name',255)->nullable();
            $table->string('branch_address',255)->nullable();
            $table->string('branch_city',255)->nullable();
            $table->string('branch_contact_person',255)->nullable();
            $table->string('branch_email',255)->nullable();
            $table->string('branch_phone1',255)->nullable();
            $table->string('branch_phone2',255)->nullable();
            $table->smallInteger('data_state')->default(0)->nullable();
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
        Schema::dropIfExists('core_branch');
    }
};
