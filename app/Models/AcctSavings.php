<?php

namespace App\Models;
use App\Models\AcctAccount;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class AcctSavings extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'acct_savings';
    protected $primaryKey = 'savings_id';
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
        'savings_last_balance' => 'decimal:2',
        'savings_profit_sharing' => 'decimal:2',
        'savings_nisbah' => 'decimal:2',
        'savings_basil' => 'decimal:2',
        'savings_index_amount' => 'decimal:2',
    ];
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->uuid)) {
                $model->uuid = Str::uuid();
            }
        });
    }
    public function AcctSavings()
    {
        return $this->belongsTo(AcctSavings::class, 'id');
    }
    public function account(): BelongsTo
    {
        return $this->belongsTo(AcctAccount::class, 'account_id');
    }
    public function branch()
    {
        return $this->belongsTo(related: CoreBranch::class);
    }
}
