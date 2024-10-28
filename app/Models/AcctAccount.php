<?php

namespace App\Models;

use App\Models\AcctSavings;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AcctAccount extends Model
{
    /** @use HasFactory<\Database\Factories\AcctAccountFactory> */
    use HasFactory;
    protected $table = 'acct_account';
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
    use SoftDeletes;
}
