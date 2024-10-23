<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class AactAccount extends Model
{
    /** @use HasFactory<\Database\Factories\AactAccountFactory> */
    use HasFactory;
    protected $table = 'aact_account';
    public function aactcredits(): HasMany
    {
        return $this->hasMany(AactCredit::class);
    }
    use SoftDeletes;
}
