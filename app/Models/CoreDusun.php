<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class CoreDusun extends Model
{
    /** @use HasFactory<\Database\Factories\CoreDusunFactory> */
    use HasFactory, SoftDeletes;
    use Notifiable;

    protected $table = 'core_dusun';

    protected $primaryKey = 'dusun_id';

    protected $fillable = [
        'dusun_id',
        'kelurahan_id',
        'dusun_code',
        'dusun_name',
        'data_state',
        'branch_id',
    ];

    protected $dates = [
        'created_on',
        'deleted_at',
    ];

    public $timestamps = true;

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
}
