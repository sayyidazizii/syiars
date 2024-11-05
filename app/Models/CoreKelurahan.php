<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CoreKelurahan extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'core_kelurahan';
    protected $primaryKey = 'kelurahan_id';
    public $incrementing = true;

    protected $fillable = [
        'kelurahan_code',
        'kecamatan_id',
        'kecamatan_code',
        'kelurahan_name',
        'kecamatan_no',
        'kelurahan_no',
        'data_state',
    ];

    protected $casts = [
        'created_on' => 'datetime',
    ];

    /**
     * Define a relationship with the related Kecamatan model.
     */
    
}
