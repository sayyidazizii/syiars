<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CoreCity extends Model
{
    use HasFactory, SoftDeletes;

    // Nama tabel dalam database
    protected $table = 'core_city';

    // Primary key dari tabel
    protected $primaryKey = 'city_id';

    // Mengatur apakah primary key auto-increment
    public $incrementing = true;

    // Tipe primary key
    protected $keyType = 'int';

    // Mengatur timestamps (created_at dan updated_at) secara otomatis
    public $timestamps = true;

    // Kolom yang bisa diisi secara massal
    protected $fillable = [
        'city_code',
        'province_id',
        'province_code',
        'city_name',
        'province_no',
        'city_no',
        'data_state',
        'branch_id',
        'created_id',
        'created_on',
        'updated_id',
        'uuid',
        'deleted_id',
    ];

    // Mengatur format untuk kolom created_on
    protected $dates = ['created_on', 'deleted_at'];

    // Konstanta untuk kolom timestamps
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public function Member(): BelongsTo
    {
        return $this->belongsTo(CoreMember::class, 'member_id');
    }
    public function core_provinces(): BelongsTo
    {
        return $this->belongsTo(CoreProvince::class, 'province_id');
    }

    public function CoreCity(): BelongsTo
    {
        return $this->belongsTo(CoreCity::class, 'city_id');
    }
    public function Branch(): BelongsTo
    {
        return $this->belongsTo(CoreBranch::class, 'branch_id');
    }


}
