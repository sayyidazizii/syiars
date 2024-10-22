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
        Schema::create('acct_deposito', function (Blueprint $table) {
            $table->bigIncrements('deposito_id'); 
            $table->unsignedInteger('account_id')->default(0)->nullable(); 
            $table->integer('account_basil_id')->default(0); 
            $table->string('deposito_code', 20)->nullable(); 
            $table->string('deposito_name', 50)->nullable(); 
            $table->integer('deposito_number')->default(0)->nullable(); 
            $table->integer('deposito_period')->default(0)->nullable(); 
            $table->decimal('deposito_interest_rate', 10, 2)->default(0.00)->nullable(); 
            $table->integer('deposito_profit_sharing')->default(0); 
            $table->smallInteger('data_state')->default(0)->nullable();
            $table->unsignedBigInteger('branch_id')->default(1)->nullable();
            $table->unsignedBigInteger('created_id')->nullable();
            $table->dateTime('created_on')->nullable(); 
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
        Schema::dropIfExists('acct_depositos');
    }
};
