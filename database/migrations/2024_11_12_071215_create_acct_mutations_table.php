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
        Schema::create('acct_mutation', function (Blueprint $table) {
            $table->id('mutation_id');
            $table->string('mutation_code', 10)->default('')->nullable(false);
            $table->string('mutation_name', 50)->default('')->nullable(false);
            $table->string('mutation_function', 10)->default('')->nullable(false);
            $table->string('mutation_status', 10)->default('')->nullable(false);
            $table->string('mutation_journal', 50)->default('')->nullable(false);
            $table->string('mutation_module', 50)->default('')->nullable(false);
            $table->decimal('data_state', 8, 2)->default(0)->nullable(false);
            $table->timestamp('last_update')->useCurrent();
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
        Schema::dropIfExists('acct_mutation');
    }
};
