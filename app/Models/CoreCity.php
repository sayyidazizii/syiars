<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class CoreCity extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'core_city';
    protected $primaryKey = 'city_id';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = true;
    protected $fillable = [
        'city_code',
        'city_name',
        'city_no',
        'province_id',
        'data_state',
        'branch_id',
        'created_id',
        'created_on',
        'updated_id',
        'uuid',
        'deleted_id',
    ];
    protected $dates = ['created_on', 'deleted_at'];
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    public function Member(): BelongsTo
    {
        return $this->belongsTo(CoreMember::class);
    }
    public function Province(): BelongsTo
    {
        return $this->belongsTo(CoreProvince::class, 'province_id');
    }
    public function Kecamatan(): HasMany
    {
        return $this->hasMany(CoreKecamatan::class);
    }
    public function Branch(): BelongsTo
    {
        return $this->belongsTo(CoreBranch::class, 'branch_id');
    }
}
