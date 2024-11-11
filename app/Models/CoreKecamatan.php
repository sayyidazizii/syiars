<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function Member(): BelongsTo
    {
        return $this->belongsTo(CoreMember::class);
    }
    public function City(): BelongsTo
    {
        return $this->belongsTo(CoreCity::class, 'city_id');
    }
    public function Kelurahan(): HasMany
    {
        return $this->hasMany(CoreKelurahan::class);
    }
    public function Branch(): BelongsTo
    {
        return $this->belongsTo(CoreBranch::class, 'branch_id',);
    }
}
