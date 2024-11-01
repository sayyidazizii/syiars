<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class CoreBranch extends Model
{
     /** @use HasFactory<\Database\Factories\CoreBranchFactory> */
     use HasFactory, SoftDeletes;
     use Notifiable;
    protected $table = 'core_branch';
    protected $fillable = [
        'branch_code',
        'branch_name',
        'branch_address',
        'branch_city',
        'branch_contact_person',
        'branch_email',
        'branch_phone1',
        'branch_phone2',
        'data_state',
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
    public function office(): HasMany
    {
        return $this->hasMany(CoreOffice::class);
    }
}
