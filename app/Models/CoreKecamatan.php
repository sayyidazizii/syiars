<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function CoreKecamatan(): BelongsTo
    {
        return $this->belongsTo(CoreKecamatan::class, 'kecamatan_id');
    }
    public function branch(): BelongsTo
    {
        return $this->belongsTo(CoreDusun::class, 'branch_id', 'branch_id');
    }

    
}
