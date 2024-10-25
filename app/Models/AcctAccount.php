<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class AcctAccount extends Model
{
    /** @use HasFactory<\Database\Factories\AcctAccountFactory> */
    use HasFactory;
    protected $table = 'acct_account';
    public function acctcredits(): HasMany
    {
        return $this->hasMany(AcctCredit::class);
    }
    use SoftDeletes;
}
