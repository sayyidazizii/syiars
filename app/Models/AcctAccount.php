<?php

namespace App\Models;

use App\Models\AcctSavings;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AcctAccount extends Model
{
    /** @use HasFactory<\Database\Factories\AcctAccountFactory> */
    use HasFactory, SoftDeletes;
    use Notifiable;
    protected $table = 'acct_account';
    protected $fillable = [
        'account_type_id',
        'account_code',
        'account_name',
        'account_group',
        'account_suspended',
        'parent_account_id',
        'top_parent_account_id',
        'account_has_child',
        'opening_debit_balance',
        'opening_credit_balance',
        'debit_change',
        'credit_change',
        'account_default_status',
        'account_remark',
        'account_status',
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
    public function acctcredits(): HasMany
    {
        return $this->hasMany(AcctCredit::class);
    }

    public function acctsavings(): HasMany
    {
        return $this->hasMany(AcctSavings::class);
    }

    public function acctdeposito(): HasMany
    {
        return $this->hasMany(AcctDeposito::class);
    }
}
