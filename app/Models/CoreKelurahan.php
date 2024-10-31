<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class CoreKelurahan extends Model
{
    /** @use HasFactory<\Database\Factories\CoreKelurahanFactory> */
    use HasFactory, SoftDeletes;
    use Notifiable;

    protected $table = 'core_kelurahan'; // Specify the table name

    protected $primaryKey = 'kelurahan_id'; // Primary key column

    protected $fillable = [
        'kelurahan_id',
        'kelurahan_code',
        'kecamatan_id',
        'kecamatan_code',
        'kelurahan_name',
        'kecamatan_no',
        'kelurahan_no',
        'data_state',
        'branch_id',
    ];

    protected $dates = [
        'created_on',
        'deleted_at',
    ];

    public $timestamps = true;

    protected static function booted() {
        $userid = auth()->id(); // Menggunakan auth() dengan tanda kurung

        static::creating(function ($model) use ($userid) {
            $model->created_id = $userid;
        });
        static::updating(function ($model) use ($userid) { // Mengubah 'updated' menjadi 'updating'
            $model->updated_id = $userid;
        });
        static::deleting(function ($model) use ($userid) {
            $model->deleted_id = $userid;
        });
    }
}
