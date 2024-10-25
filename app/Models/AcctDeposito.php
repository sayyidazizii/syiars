<?php

namespace App\Models;

use auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class AcctDeposito extends Model
{
    use HasFactory, SoftDeletes;
    use Notifiable;

    protected $table = 'acct_deposito'; // Specify the table name

    protected $primaryKey = 'deposito_id'; // Primary key column

    protected $fillable = [
        'deposito_id',
        'account_id',
        'account_basil_id',
        'deposito_code',
        'deposito_name',
        'deposito_number',
        'deposito_period',
        'deposito_interest_rate',
        'deposito_profit_sharing',
        'data_state',
        'branch_id',
    ];

    protected $dates = [
        'created_on',
        'deleted_at', 
    ];

    public $timestamps = true; 

    protected static function booted() {
        $userid = auth()->id(); // Menggunakan auth() dengan tanda kurung
    
        static::creating(function ($model) use ($userid) {
            $model->created_id = $userid;
        });
        static::updating(function ($model) use ($userid) { // Mengubah 'updated' menjadi 'updating'
            $model->updated_id = $userid;
        });
        static::deleting(function ($model) use ($userid) {
            $model->deleted_id = $userid;
        });
    }
    
}    
