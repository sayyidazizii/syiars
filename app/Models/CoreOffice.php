<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
class CoreOffice extends Model
{
    /** @use HasFactory<\Database\Factories\CoreOfficeFactory> */
    use HasFactory, SoftDeletes;
    use Notifiable;
    protected $table = 'core_office';
    protected $primaryKey = 'office_id';
    protected $fillable = [
        'office_id',
        'branch_id',
        'user_id',
        'office_code',
        'office_name',
        'data_state',
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
    public function branch(): BelongsTo
    {
        return $this->belongsTo(CoreBranch::class, 'branch_id');
    }
}
