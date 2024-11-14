<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class AcctCredit extends Model
{
    /** @use HasFactory<\Database\Factories\AcctCreditFactory> */
    use HasFactory, SoftDeletes;
    use Notifiable;
    protected $table = 'acct_credits';
    protected $primaryKey = 'credits_id';
    protected $fillable = [
        'account_id',
        'credits_code',
        'credits_name',
        'credits_number',
        'receivable_account_id',
        'income_account_id',
        'credits_fine',
        'data_state',
        'branch_id',
    ];
    protected $dates = [
        'created_on',
        'deleted_at',
    ];
    public $timestamps = true;
    protected static function booted() {
        $userid = auth()->id();
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
    public function account(): BelongsTo
    {
        return $this->belongsTo(AcctAccount::class, 'account_id');
    }
}
