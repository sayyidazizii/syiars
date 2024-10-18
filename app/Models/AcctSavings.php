<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AcctSavings extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'acct_savings'; // Specify the table name if it differs from the pluralized model name

    protected $primaryKey = 'savings_id'; // Specify the primary key if it's not 'id'

    protected $fillable = [
        'savings_code',
        'savings_name',
        'account_id',
        'account_basil_id',
        'savings_number',
        'savings_last_balance',
        'savings_profit_sharing',
        'savings_nisbah',
        'savings_basil',
        'savings_status',
        'savings_logo',
        'savings_icon',
        'savings_card',
        'savings_index_amount',
        'data_state',
        'branch_id',
        'created_id',
        'updated_id',
        'uuid',
        'deleted_id',
    ];

    protected $casts = [
        'savings_last_balance' => 'decimal:2',
        'savings_profit_sharing' => 'decimal:2',
        'savings_nisbah' => 'decimal:2',
        'savings_basil' => 'decimal:2',
        'savings_index_amount' => 'decimal:2',
        'savings_status' => 'boolean',
        'data_state' => 'boolean',
        'deleted_id' => 'integer',
        'account_id' => 'integer',
        'account_basil_id' => 'integer',
        'branch_id' => 'integer',
        'created_id' => 'integer',
        'updated_id' => 'integer',
    ];

    // Define any relationships if applicable
    public function account()
    {
        return $this->belongsTo(Account::class, 'account_id');
    }

    public function accountBasil()
    {
        return $this->belongsTo(AccountBasil::class, 'account_basil_id');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }
}
