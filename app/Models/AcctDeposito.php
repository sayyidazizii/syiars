<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;

class AcctDeposito extends Model
{
    use HasFactory, SoftDeletes, Notifiable;

    protected $table = 'acct_deposito'; // Specify the table name

    protected $primaryKey = 'deposito_id'; // Primary key column

    protected $fillable = [
        'account_basil_id',
        'deposito_code',
        'deposito_name',
        'deposito_number',
        'account_id',
        'deposito_period',
        'deposito_profit_sharing',
        'deposito_interest_rate',
        'data_state',
        'branch_id',
        'created_id',
        'created_on',
        'updated_id',
        'uuid',
        'deleted_id',
    ];

    protected $dates = [
        'created_on',
        'deleted_at',
    ];

    public $timestamps = true;

    protected static function booted() {
        $userid = Auth::id(); // Use Auth facade directly

        static::creating(function ($model) use ($userid) {
            $model->created_id = $userid;
        });
        static::updating(function ($model) use ($userid) {
            $model->updated_id = $userid;
        });
        static::deleting(function ($model) use ($userid) {
            $model->deleted_id = $userid;
        });
    }

    // If this relationship is intended, ensure the foreign key is correct
    // Otherwise, you might want to remove it
    public function account(): BelongsTo
    {
        return $this->belongsTo(AcctAccount::class, 'account_id');
    }

    public function branch(): BelongsTo
    {
        return $this->belongsTo(CoreBranch::class, 'branch_id', 'branch_id');
    }
}
