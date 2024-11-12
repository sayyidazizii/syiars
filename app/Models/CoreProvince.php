<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CoreProvince extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'core_province'; // Nama tabel yang digunakan

    protected $primaryKey = 'province_id';


    protected $fillable = [
        'province_code',
        'province_name',
        'province_no',
        'data_state',
        'branch_id',
        'created_id',
        'updated_id',
        'uuid',
        'deleted_id'
    ]; // Kolom yang dapat diisi massal

    public function branch()
    {
        return $this->belongsTo(CoreBranch::class, 'branch_id');
    }
    public function Member(): BelongsTo
    {
        return $this->belongsTo(CoreMember::class);
    }
    public function City(): HasMany
    {
        return $this->hasMany(CoreCity::class,'province_id');
    }
}


