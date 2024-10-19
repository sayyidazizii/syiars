<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AactCredit extends Model
{
    /** @use HasFactory<\Database\Factories\AactCreditFactory> */
    use HasFactory;
    protected $primaryKey = 'credits_id';
}
