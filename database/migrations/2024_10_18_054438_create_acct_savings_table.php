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
        Schema::create('acct_savings', function (Blueprint $table) {
            $table->bigIncrements('savings_id');
            $table->string('savings_code')->nullable();
            $table->string('savings_name')->nullable();
            $table->unsignedBigInteger('account_id')->default(0);
            $table->unsignedBigInteger('account_basil_id')->default(0);
            $table->string('savings_number')->default('0');
            $table->decimal('savings_last_balance', 15, 2)->default(0.00);
            $table->decimal('savings_profit_sharing', 15, 2)->default(0.00);
            $table->decimal('savings_nisbah', 5, 2)->nullable();
            $table->decimal('savings_basil', 15, 2)->nullable();
            $table->tinyInteger('savings_status')->default(0)->nullable();
            $table->string('savings_logo')->nullable();
            $table->string('savings_icon')->nullable();
            $table->string('savings_card')->nullable();
            $table->decimal('savings_index_amount', 15, 2)->nullable();
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
        Schema::dropIfExists('acct_savings');
    }
};
