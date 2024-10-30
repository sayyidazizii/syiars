<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class CoreBranch extends Model
{
    /** @use HasFactory<\Database\Factories\CoreBranchFactory> */
    use HasFactory;
    protected $table = 'core_branch';
    public function office(): HasMany
    {
        return $this->hasMany(CoreOffice::class);
    }
}
