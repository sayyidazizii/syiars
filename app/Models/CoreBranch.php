<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoreBranch extends Model
{
    /** @use HasFactory<\Database\Factories\CoreBranchFactory> */
    use HasFactory;
    protected $primaryKey = 'branch_id';
    protected $table = 'core_branch';
}
