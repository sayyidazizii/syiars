<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class AcctMutation extends Model {
    use HasFactory;
    protected $table = 'acct_mutation';
    protected $primaryKey = 'mutation_id';
    public $timestamps = false;
    protected $fillable = [
        'mutation_code',
        'mutation_name',
        'mutation_function',
        'mutation_status',
    ];
}
