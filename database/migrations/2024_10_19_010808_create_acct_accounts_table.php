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
        Schema::create('acct_account', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('account_type_id')->default(0)->nullable();
            $table->string('account_code', 255)->nullable();
            $table->string('account_name', 255)->nullable();
            $table->string('account_group', 255)->nullable();
            $table->decimal('account_suspended', 1,0)->default(0)->nullable();
            $table->unsignedBigInteger('parent_account_id')->default(0)->nullable();
            $table->unsignedBigInteger('top_parent_account_id')->default(0)->nullable();
            $table->enum('account_has_child', ['1', '0'])->default(0)->nullable();
            $table->decimal('opening_debit_balance', 20,2)->default(0.00)->nullable();
            $table->decimal('opening_credit_balance', 20,2)->default(0.00)->nullable();
            $table->decimal('debit_change', 20,2)->default(0.00)->nullable();
            $table->decimal('credit_change', 20,2)->default(0.00)->nullable();
            $table->decimal('account_default_status', 1,0)->default(0)->nullable();
            $table->text('account_remark')->nullable();
            $table->decimal('account_status', 1,0)->default(0)->nullable();
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
        Schema::dropIfExists('acct_account');
    }
};

