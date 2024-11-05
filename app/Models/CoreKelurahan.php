<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

     protected static function booted() {
        $userid = auth()->id();

        static::creating(function ($model) use ($userid) {
            $model->created_id = $userid;
        });
        static::updating(function ($model) use ($userid) {
            $model->updated_id = $userid;
        });
        static::deleting(function ($model) use ($userid) {
            $model->deleted_id = $userid;
        });
    }

    public function CoreKelurahan(): BelongsTo
    {
        return $this->belongsTo(CoreKelurahan::class, 'kelurahan_id');
    }

    public function branch(): BelongsTo
    {
        return $this->belongsTo(CoreDusun::class, 'branch_id', 'branch_id');
    }

    
}
