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
        Schema::create('aact_credits', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('account_id')->constrained(
                table: 'acct_account',
                indexName: 'credits_account_id'
            );
            $table->string('credits_code', 255);
            $table->string('credits_name', 255);
            $table->unsignedBigInteger('credits_number')->default(0)->nullable();
            $table->unsignedBigInteger('receivable_account_id')->default(0);
            $table->unsignedBigInteger('income_account_id')->default(0);
            $table->unsignedBigInteger('credits_fine')->nullable();
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
        Schema::dropIfExists('aact_credits');
    }
};
