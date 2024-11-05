<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoreKecamatan extends Model
{
    use HasFactory;

    protected $table = 'core_kecamatan';

    protected $primaryKey = 'kecamatan_id';

    public $timestamps = true;

    protected $fillable = [
        'city_code',
        'city_id',
        'kecamatan_code',
        'kecamatan_name',
        'city_no',
        'kecamatan_no',
        'data_state',
    ];
}
