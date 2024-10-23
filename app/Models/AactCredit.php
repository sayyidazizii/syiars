<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class AactCredit extends Model
{
    /** @use HasFactory<\Database\Factories\AactCreditFactory> */
    use HasFactory;
    public function aactaccount(): BelongsTo
    {
        return $this->belongsTo(AactAccount::class, 'account_id');
    }
    use SoftDeletes;
}
