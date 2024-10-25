<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class AcctCredit extends Model
{
    /** @use HasFactory<\Database\Factories\AcctCreditFactory> */
    use HasFactory;
    public function account(): BelongsTo
    {
        return $this->belongsTo(AcctAccount::class, 'account_id');
    }
    use SoftDeletes;
}
