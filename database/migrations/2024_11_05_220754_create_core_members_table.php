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
        Schema::create('core_member', function (Blueprint $table) {
            $table->increments('member_id');
            $table->unsignedBigInteger('branch_id')->default(0)->nullable();
            $table->unsignedBigInteger('province_id')->default(0)->nullable();
            $table->unsignedBigInteger('city_id')->default(0)->nullable();
            $table->unsignedBigInteger('kecamatan_id')->default(0)->nullable();
            $table->unsignedBigInteger('kelurahan_id')->default(0)->nullable();
            $table->unsignedBigInteger('dusun_id')->default(0)->nullable();
            $table->string('member_no', 50)->nullable();
            $table->string('member_name', 100)->nullable();
            $table->decimal('member_gender', 1,0)->default(0)->nullable();
            $table->string('member_place_of_birth', 100)->nullable();
            $table->date('member_date_of_birth')->nullable();
            $table->text('member_address')->nullable();
            $table->string('member_postal_code', 10)->nullable();
            $table->string('member_phone', 20)->nullable();
            $table->string('member_job', 100)->nullable();
            $table->unsignedBigInteger('identity_id')->default(0)->nullable();
            $table->decimal('member_identity', 1,0)->default(0)->nullable();
            $table->string('member_identity_no', 50)->nullable();
            $table->decimal('member_character', 1,0)->default(0)->nullable();
            $table->string('member_mother', 50)->nullable();
            $table->string('member_heir', 50)->nullable();
            $table->string('member_family_relationship', 50)->nullable();
            $table->decimal('member_status', 1,0)->default(0)->nullable();
            $table->date('member_register_date')->nullable();
            $table->decimal('member_principal_savings', 20,2)->default(0.00)->nullable();
            $table->decimal('member_special_savings', 20,2)->default(0.00)->nullable();
            $table->decimal('member_mandatory_savings', 20,2)->default(0.00)->nullable();
            $table->decimal('member_principal_savings_last_balance', 20,2)->default(0.00)->nullable();
            $table->decimal('member_special_savings_last_balance', 20,2)->default(0.00)->nullable();
            $table->decimal('member_mandatory_savings_last_balance', 20,2)->default(0.00)->nullable();
            $table->decimal('saldo_pokok_old', 20,2)->default(0.00)->nullable();
            $table->decimal('saldo_wajib_old', 20,2)->default(0.00)->nullable();
            $table->decimal('saldo_khusus_old', 20,2)->default(0.00)->nullable();
            $table->string('member_token', 50)->nullable();
            $table->string('member_token_edit', 50)->nullable();
            $table->unsignedBigInteger('member_last_number')->default(0);
            $table->string('member_password_default', 200)->nullable();
            $table->string('member_password', 200)->nullable();
            $table->unsignedBigInteger('savings_account_id')->default(0)->nullable();
            $table->string('member_no_old', 50)->nullable();
            $table->unsignedBigInteger('member_no_status')->default(0)->nullable();
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
        Schema::dropIfExists('core_member');
    }
};
