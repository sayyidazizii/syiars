<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
class SystemMenu extends Model
{
    /** @use HasFactory<\Database\Factories\SystemMenuFactory> */
    use HasFactory, SoftDeletes;
    use Notifiable;
    protected $table = 'system_menu';
    protected $primaryKey = 'id_menu';
    protected $fillable = [
        'id',
        'type',
        'indent_level',
        'text',
        'image',
        'company_id',
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
